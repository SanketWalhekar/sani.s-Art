<?php
require "conn.php";
session_start();

$email = $_POST['eMail'];
$email = mysqli_real_escape_string($conn, $email);

$pass = $_POST['password'];
$pass = mysqli_real_escape_string($conn, $pass);
$pass1 = password_hash($pass, PASSWORD_BCRYPT);

$first = $_POST['firstName'];
$first = mysqli_real_escape_string($conn, $first);

$phone = $_POST['phone'];
$phone = mysqli_real_escape_string($conn, $phone);

$str = substr($first, 0, 4);
$mob = substr($phone, 0, 4);
$pa = substr($pass, 0, 3);
$rand = rand(1000, 9999);
$customer_id = $str . '-' . $mob . '-' . $pa . '-' . $rand;

// Check if email already exists
$query = "SELECT * FROM register WHERE email='$email'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
$num = mysqli_num_rows($result);

if ($num != 0) {
    $m = "Email Already Exists";
    header('location: index.php?error=' . $m);
} else {
    // Corrected SQL query with proper quotes around $first and $email
    $quer = "INSERT INTO register(customer_id, name, email, phone, password) VALUES ('$customer_id', '$first', '$email', '$phone', '$pass1')";
    $result = mysqli_query($conn, $quer);
    if ($result) {
        echo "Record inserted successfully.";
        $user_id = mysqli_insert_id($conn);
        $_SESSION['email'] = $email;
        $_SESSION['registration_success'] = true; // Add this line to set a flag
        header('location: index.php'); // Redirect to index.php
        // $_SESSION['user_id'] = $customer_id;
        // You might want to redirect the user to another page here.
    } else {
        echo "Error inserting record: " . mysqli_error($conn);
    }
}
?>
