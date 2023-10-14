<?php
require_once 'conn.php';

if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    // Replace this with your database connection and query logic

    $sql = "SELECT * FROM sketch_detail WHERE product_id = $productId"; // Replace with your actual table and field names

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $productData = mysqli_fetch_assoc($result);
    }

    mysqli_close($connection);

    // Return product data as JSON
    header('Content-Type: application/json');
    echo json_encode($productData);
}
?>
