<?php
require_once 'header.php';
require_once 'conn.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title>Product Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Add the SweetAlert library -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
    /* Optional custom CSS styles */
    .container1
    {
      max-width: 850px;
      margin: 0 auto;
      margin-top: 40px;
      margin-bottom:90px;
      padding: 20px;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      font-weight: bold;
    }
  </style>
</head>
<body>
    <section>

  <div class="container1">
    <h2 class="my-4">Product Form</h2>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
    <label for="productFeature">Type of Sketch</label>
    <select class="form-control" id="type" name="type" required>
        <option value="" disabled selected>Select an option</option>
        <option value="Pencil">Pencil Sketch</option>
        <option value="Acrylic">Acrylic Paintings</option>
        <option value="Canvas">Canvas Paintings</option>
        <option value="Nature">Nature Artwork</option>
        <!-- Add more options as needed -->
    </select>
</div>
      <div class="form-group">
        <label for="productName">Name:</label>
        <input type="text" class="form-control" id="productName" name="productName" required>
      </div>
      <div class="form-group">
        <label for="productPrice">Price:</label>
        <input type="number" step="0.01" class="form-control" id="productPrice" name="productPrice" required>
      </div>
      <div class="form-group">
        <label for="productPhoto">Photo:</label>
        <input type="file" class="form-control-file" name="productPhoto" id="productPhoto">
      </div>
      <div class="form-group">
        <label for="productFeature">Feature:</label>
        <textarea class="form-control" id="productFeature" name="productFeature" rows="3" required></textarea>
      </div>
      







      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
  </section>

  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</body>
</html>
<?php
include 'conn.php';
if(isset($_POST['submit']))
{
  // Get data from the Form
  $name = $_POST['productName'];
  $price = $_POST['productPrice'];
  $image = $_FILES['productPhoto'];
  $feature = $_POST['productFeature'];

  $filename = $image['name'];
  $filepath = $image['tmp_name'];
  $fileerror = $image['error'];
  $type=$_POST['type'];
  echo $type;
  $str=substr($name,0,4);
    
    
    
    $rand=rand(1000,9999);
    $product_id=$str.'-'.$type.'-'.$rand;
  if($fileerror === 0){
    $destfile = 'upload/' . $filename;
    move_uploaded_file($filepath, $destfile);
    

    // Use $destfile instead of $image in the INSERT query to store the file path in the database
    $insertquery = "INSERT INTO `sketch_detail` (`product_id`, `type`, `name`, `price`, `image`, `feature`) VALUES ('$product_id', '$type', '$name', '$price', '$destfile', '$feature');";
    $res = mysqli_query($conn, $insertquery);

    if($res){
      echo '<script>swal("Good job!", "Successfully Added!", "success");</script>';
    } else {
      echo '<script>swal("Oops!", "Something went wrong, Retry Again!", "error");</script>';
    }
}
}
//    if($type=='Acrylic')
//   {   
//     $insertquery="INSERT INTO `acrylic` (`name`, `price`, `photo`, `feature`) VALUES ('$name', '$price', '$destfile', '$feature');";
//     $res = mysqli_query($conn, $insertquery);

//     if($res){
//       echo '<script>swal("Good job!", "Successfully Added!", "success");</script>';
//     } else {
//       echo '<script>swal("Oops!", "Something went wrong, Retry Again!", "error");</script>';
//     }
//  }
//  if($type=='Canvas')
//  {   
//    $insertquery="INSERT INTO `canvas` (`name`, `price`, `photo`, `feature`) VALUES ('$name', '$price', '$destfile', '$feature');";
//    $res = mysqli_query($conn, $insertquery);

//    if($res){
//      echo '<script>swal("Good job!", "Successfully Added!", "success");</script>';
//    } else {
//      echo '<script>swal("Oops!", "Something went wrong, Retry Again!", "error");</script>';
//    }
// }
// if($type=='Nature')
//  {   
//    $insertquery="INSERT INTO `nature` (`name`, `price`, `photo`, `feature`) VALUES ('$name', '$price', '$destfile', '$feature');";
//    $res = mysqli_query($conn, $insertquery);

//    if($res){
//      echo '<script>swal("Good job!", "Successfully Added!", "success");</script>';
//    } else {
//      echo '<script>swal("Oops!", "Something went wrong, Retry Again!", "error");</script>';
//    }
// }
// }
//   }

?>