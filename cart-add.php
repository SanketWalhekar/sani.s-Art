<?php
require("conn.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $user_id = $_SESSION['Loginid'];

    // Check if the product is already in the cart for the user
    $cart_sql = "SELECT * FROM users_products WHERE user_id = '$user_id' AND item_id = '$product_id'";
    $cart_result = mysqli_query($conn, $cart_sql);

    if (!$cart_result) {
        die("Query failed: " . mysqli_error($conn)); // Print the error message
    }

    if (mysqli_num_rows($cart_result) == 1) {
        // Product is already in the cart, update the quantity
        $update_sql = "UPDATE users_products SET quantity = quantity + 1 WHERE user_id = '$user_id' AND item_id = '$product_id'";
        if (mysqli_query($conn, $update_sql)) {
            echo json_encode(['message' => 'Product quantity updated in cart and database']);
        } else {
            echo json_encode(['error' => 'Error updating product quantity in cart and database']);
        }
        $_SESSION['product_update'] = true; // Add this line to set a flag
        header('location: products.php');
    }
        
        

    else {
        // Product is not in the cart, insert it with quantity 1
        $insert_sql = "INSERT INTO users_products (user_id, item_id, status, quantity) VALUES ('$user_id', '$product_id', 'Added to cart', 1)";
        if (mysqli_query($conn, $insert_sql)) {
            $_SESSION['success_message'] = 'Product added to cart successfully.';
        } else {
            echo json_encode(['error' => 'Error adding product to cart and database']);
        }

        $_SESSION['product_success'] = true; // Add this line to set a flag
        header('location: products.php');
        
    }
}
?>

