<?php
session_start();
require_once 'conn.php';
// require_once 'header.php';

if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];
    // Fetch data based on ID and sketch type
    $sql = "SELECT * FROM sketch_detail WHERE product_id = '$id'";
    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . $conn->error);
    }
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data and update the database
    $newtype = $_POST['type'];
    $newName = $_POST['new_name'];
    $newfeature = $_POST['new_feature'];
    $newPrice = $_POST['new_price'];

    // Check if the file was uploaded successfully
    if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] === 0) {
        $image = $_FILES['new_image'];
        $filename = $image['name'];
        $filepath = $image['tmp_name'];

        // Move the uploaded file to the destination
        $destfile = 'upload/' . $filename;
        move_uploaded_file($filepath, $destfile);

        // Update data based on ID and sketch type
        $updateSql = "UPDATE sketch_detail SET type='$newtype', name='$newName', price='$newPrice', image='$destfile', feature='$newfeature' WHERE product_id = '$id'";
        if ($conn->query($updateSql) === TRUE) {
            $_SESSION['edit_success'] = true; // Add this line to set a flag
            header('location:sketch_detail.php');
            
        } else {
            $_SESSION['edit1_success'] = true; // Add this line to set a flag
            header('location:sketch_detail.php');
            
            
        }
    } else {
        // No new file uploaded, use the existing photo path
        $destfile = $row['image'];

        // Update data based on ID and sketch type
        $updateSql = "UPDATE sketch_detail SET type='$newtype', name='$newName', price='$newPrice', image='$destfile', feature='$newfeature' WHERE product_id = '$id'";

        if ($conn->query($updateSql) === TRUE) {
            $_SESSION['edit_success'] = true; // Add this line to set a flag
            header('location:sketch_detail.php');
            
        } else {
            $_SESSION['edit1_success'] = true; // Add this line to set a flag
            header('location:sketch_detail.php');
            
            
        }
        
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Item</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <?php
    require_once 'header.php';
    ?>
    <!-- Your PHP and HTML code here -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    /* Optional custom CSS styles */
    .container1 {
        max-width: 850px;
        margin: 0 auto;
        margin-top: 40px;
        margin-bottom: 90px;
        padding: 20px;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>
<body>
<section>
    <div class="container1">
        <h2>Edit Item</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productFeature">Type of Sketch</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
                    <option value="Pencil">Pencil Sketch</option>
                    <option value="Acrylic">Acrylic Paintings</option>
                    <option value="Canvas">Canvas Paintings</option>
                    <option value="Nature">Nature Artwork</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="new_name">Name:</label>
                <input type="text" class="form-control" id="new_name" name="new_name" value="<?php echo $row['name']; ?>">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="new_name" name="new_price" value="<?php echo $row['price']; ?>">
            </div>
            <div class="form-group">
                <label for="new_image">Image:</label>
                <?php if (!empty($row['image'])) { ?>
                    <img src="<?php echo $row['image']; ?>" alt="Current Image" style="max-width: 100px;"><br>
                <?php } ?>
                <input type="file" class="form-control" id="new_image" name="new_image">
                <label>Current File: <?php echo $row['image']; ?></label>
            </div>
            <div class="form-group">
                <label for="new_description">Feature:</label>
                <textarea class="form-control" id="new_description" name="new_feature"><?php echo $row['feature']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</section>
</body>
</html>
