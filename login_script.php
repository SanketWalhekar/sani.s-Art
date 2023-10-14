<?php
require("conn.php");
session_start();
$email = $_POST['lemail'];
$password = $_POST['lpassword'];

// Validate form data
$errors = array();
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Valid email is required.";
}
if (empty($password)) {
    $errors[] = "Password is required.";
}

// If there are no errors, proceed with login
if (empty($errors)) {
    // Replace this with your actual database connection code

    // Retrieve user record from the database based on the provided email
    $sql = "SELECT * FROM register WHERE email = '$email'";
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the password using password_verify
        if (password_verify($password, $hashedPassword))  {
            $_SESSION['Loginid'] = $row['customer_id'];
            $_SESSION['email'] = $row['email'];
            echo "<h2>Login Successful!</h2>";
            $_SESSION['login_success'] = true; // Add this line to set a flag
            header('location: index.php');
            exit(); // Make sure to exit after the redirect
        } else {
            // Password is incorrect
            $errors[] = "Invalid Username or Password.";
        }
    } else {
        // User with the provided email does not exist
        $errors[] = "Invalid Username or Password.";
    }
}

// Display the validation errors
if (!empty($errors)) {
    $_SESSION['login_failed'] = true; // Add this line to set a flag
    header('location: index.php');
    
}
?>

