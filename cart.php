<?php
require "conn.php";
session_start();
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planet Shopify | Online Shopping Site for Men</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="styleeee.css">
</head>
<body>
<?php
include 'includes/header_menu.php';
?>
<<div class="d-flex justify-content-center">
    <div class="col-md-6 my-5 table-responsive p-5">
        <table class="table table-striped table-bordered table-hover ">
            <?php
            $sum = 0;
            $user_id = $_SESSION['Loginid'];
            $query = "SELECT 
                sketch_detail.price AS Price, 
                sketch_detail.product_id,
                sketch_detail.image AS Image, 
                sketch_detail.name AS Name,
                users_products.quantity AS Quantity 
                FROM 
                users_products 
                JOIN 
                sketch_detail 
                ON 
                users_products.item_id = sketch_detail.product_id
                WHERE 
                users_products.user_id = '$user_id' 
                AND users_products.status = 'Added To Cart';";

            $result = mysqli_query($conn, $query);
            if (!$result) {
                // Handle the query error, and display the error message for debugging
                die("Query failed: " . mysqli_error($conn));
            }
            if (mysqli_num_rows($result) >= 1) {
                ?>
                <thead>
                    <tr>
                        <th>Item No.</th>
                        <th>Image</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <!-- <th>Quantity</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $itemNumber = 1; // Initialize the item number
                    while ($row = mysqli_fetch_array($result)) {
                        $sum += $row["Price"]*$row['Quantity'];
                        $id = $row["product_id"] . ", ";
                        $image = $row["Image"];
                        echo "<tr>";
                        echo "<td>" . "#" . $itemNumber . "</td>"; // Display the auto-incremented item number
                        echo "<td><img src='$image' alt='Product Image' height='120' width='120'></td>";
                        echo "<td>" . $row["Name"] . "</td>";
                        echo "<td>". $row["Quantity"] ."*( Rs " . $row["Price"] . ")</td>";
                        // echo "<td>" . $row["Quantity"] . "</td>";
                        echo "<td><a href='cart-remove.php?id={$row['product_id']}' class='remove_item_link'> Remove</a></td>";
                        echo "</tr>";
                        $itemNumber++; // Increment the item number
                    }
                    $id = rtrim($id, ", ");
                    echo "<tr><td></td><td></td><td>Total</td><td>Rs " . $sum . "</td><td><a href='success.php' class='btn btn-primary'>Confirm Order</a></td></tr>";
                    ?>
                </tbody>
            <?php
            } else {
                echo "<div> <img src='images/emptycart.png' class='image-fluid' height='150' width='150'></div><br/>";
                echo "<div class='text-bold  h5'>Add items to the cart first!<div>";
            }
            ?>
        </table>
    </div>
 </div>

                
            
 </div>
        <!--footer -->
         <?php include 'includes/footer.php'?>
        <!--footer end-->

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
});
$(document).ready(function() {

if(window.location.href.indexOf('#login') != -1) {
  $('#login').modal('show');
}

});
</script>
<?php if (isset($_GET['error'])) {$z = $_GET['error'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
<?php if (isset($_GET['errorl'])) {$z = $_GET['errorl'];
    echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>";
    echo "<script type='text/javascript'>alert('" . $z . "')</script>";}?>
</html>
