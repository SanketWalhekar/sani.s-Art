<?php
require "conn.php";
session_start();

if (isset($_POST['submit'])) { // Assuming you have a form field with name="submit"
    $name = $_POST['name'];
    $email = $_POST['email'];
    $email = mysqli_real_escape_string($conn, $email); // Correct variable name

    // Check if the 'productPhoto' file input is set and not empty
    if(isset($_FILES['productPhoto']) && $_FILES['productPhoto']['error'] === 0){
        
        $image = $_FILES['productPhoto'];
        $filename = $image['name'];
        $filepath = $image['tmp_name'];

        $size = $_POST['dropdown'];
        $frame = $_POST['radio'];
        $requirement = $_POST['requirement'];
        $str=substr($name,0,4);
        $rand=rand(1000,9999);
        $order_id=$str.'-'.$rand;

        $destfile = 'sketch_order/' . $filename;
        move_uploaded_file($filepath, $destfile);

        $que = "INSERT INTO `sketch_order` (`order_id`, `name`, `email`, `image`, `size`, `frame`, `requirement`, `status`) VALUES ('$order_id','$name', '$email', '$destfile', '$size', '$frame', '$requirement', 0);";
        $result = mysqli_query($conn, $que);
        if (!$result) {
            die("Query failed: " . $conn->error);
        }
        if ($result) {
            echo "Record inserted successfully.";
            $_SESSION['added'] = true; // Add this line to set a flag
            header('location: page.php');
            exit();
        } else {
            echo "Something Went Wrong";
        }
    } else {
        echo "File upload error.";
    }
} else {
    echo "Form not submitted.";
}
?>
