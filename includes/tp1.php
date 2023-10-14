<!-- edit.php -->
<?php
require_once 'conn.php';

if (isset($_GET['id']) && isset($_GET['sketchType'])) {
    $id = $_GET['id'];
    $sketchType = $_GET['sketchType'];
    
    // Fetch data based on ID and sketch type
    $sql = "SELECT * FROM $sketchType WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data and update the database
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
        $updateSql = "UPDATE $sketchType SET name = '$newName', feature = '$newfeature', price='$newPrice', photo='$destfile' WHERE id = $id";
        if ($conn->query($updateSql) === TRUE) {
            echo '<script>swal("Good job!", "Successfully Updated!", "success");</script>';
            header("Location: sketchdetail.php?sketchType=$sketchType");

        } else {
            echo '<script>swal("Oops!", "Something went wrong, Retry Again!", "error");</script>';
        }
    }
    else {
        // No new file uploaded, use the existing photo path
        $destfile = $row['photo'];

        // Update data based on ID and sketch type
        $updateSql = "UPDATE $sketchType SET name = '$newName', feature = '$newfeature', price='$newPrice', photo='$destfile' WHERE id = $id";
        
        if ($conn->query($updateSql) === TRUE) {
            echo '<script>swal("Good job!", "Successfully Updated!", "success");</script>';
            header("Location: sketchdetail.php?sketchType=$sketchType");
        } else {
            echo '<script>swal("Oops!", "Something went wrong, Retry Again!", "error");</script>';
        }
    } 

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
    <!-- Include Bootstrap CSS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    /* Optional custom CSS styles */
    .container1
    {
      max-width: 600px;
      margin: 0 auto;
      margin-top: 40px;
      margin-bottom:90px;
      padding: 20px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    </style>
    
</head>

<body>
    <?php
    require_once('adminheader.php');

    ?>
    <div class="container1">
        <h2>Edit Item</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="new_name">Name:</label>
                <input type="text" class="form-control" id="new_name" name="new_name" value="<?php echo $row['name']; ?>">
            </div>
            <div class="form-group">
                <label for="new_description">Feature:</label>
                <textarea class="form-control" id="new_description" name="new_feature"><?php echo $row['feature']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="new_name" name="new_price" value="<?php echo $row['price']; ?>">
            </div>
            <div class="form-group">
                 <label for="new_image">Image:</label>
                 <?php if (!empty($row['photo'])) { ?>
                 <img src="<?php echo $row['photo']; ?>" alt="Current Image" style="max-width: 100px;"><br>
                 <?php } ?>
                 <input type="file" class="form-control" id="new_image" name="new_image">
                 <label>Current File: <?php echo $row['photo']; ?></label>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <?php require_once('footer.php') ?>
</body>
</html>