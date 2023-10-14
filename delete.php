<?php
require_once('conn.php');
session_start();



if (isset($_GET['product_id']) ) {
    $id = $_GET['product_id'];
    

    // Determine the table based on the sketch type
   
    // Delete data based on ID
    $deleteSql = "DELETE FROM sketch_detail WHERE product_id= '$id'";
    if ($conn->query($deleteSql) === TRUE) {
        echo '<script>swal("Success!", "Deleted Successfully", "success");</script>';
        

        $_SESSION['delete_success'] = true; // Add this line to set a flag
        header('location: sketch_detail.php');    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
