<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sani.s Art</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="styleeee.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
     
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['product_success']) && $_SESSION['product_success']) {
                echo 'Swal.fire("Good job!", "Product Added to the cart", "success");';
                unset($_SESSION['product_success']); // Clear the session variable
            }
            ?>
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['product_update']) && $_SESSION['product_update']) {
                echo 'Swal.fire("Good job!", "Product Quantity Updated !!!", "success");';
                unset($_SESSION['product_update']); // Clear the session variable
            }
            ?>
        });
    </script>
    <style>
        .card {
            height: 100%; /* Ensure all cards have the same height */
        }

        .card-img-top {
            height: 200px; /* Set a fixed height for the card image */
            object-fit: cover; /* Maintain aspect ratio and cover the container */
        }

        .card-body {
            height: 100%; /* Make sure card bodies take up the same space */
        }
    </style>
</style>
</head>
<body>
<!--header -->
 <?php
include 'includes/header_menu.php';
include 'includes/check-if-added.php';
?>
<!--header ends -->
<div class="container" style="margin-top:65px">
         <!--jumbutron start-->
        <div class="jumbotron text-center">
            <h1>Welcome to Sani.s Art</h1>
            <p>"Welcome to Sani's Art, where passion meets canvas. Our gallery is a sanctuary for art lovers, showcasing a captivating collection that speaks to the soul. Immerse yourself in a world of creativity and inspiration, where every stroke and hue tells a unique story. Explore the essence of artistic expression with us."





 </p>
        </div>
        <!--jumbutron ends-->
        <!--breadcrumb start-->
        
        <!--breadcrumb end-->
    <hr/>
    <?php
      include 'conn.php';

      // Fetch data from the "pencil" table
     $sql = "SELECT * FROM sketch_detail where type='Pencil'";
      $result = mysqli_query($conn, $sql);

         // Store the fetched data in an array
       $pencils = [];
        while ($row = mysqli_fetch_assoc($result)) {
         $pencils[] = $row;
         }

 // Close the database connection

 ?>
    <!--menu list-->
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Arts</li>
                <li class="breadcrumb-item active" aria-current="page">Pencil</li>

            </ol>
        </nav>
    <div class="row text-center" id="pencil">
            <?php foreach ($pencils as $acc) { ?>
                <div class="col-md-3 col-6 py-2">
                    <div class="card">
                        <img src="<?php echo $acc['image']; ?>" alt="" class="card-img-top">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $acc['name']; ?></h6>
                            <h6 class="card-text">Price: Rs <?php echo $acc['price']; ?></h6>
                            <h6 class="card-text"><?php echo $acc['feature']; ?></h6>
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="index.php#login" role="button" class="btn btn-warning text-white">Add To Cart</a></p>
                            <?php } 
                                 else { ?>
                                    <form method="post" action="cart-add.php">
                                    <input type="hidden" name="product_id" value="<?php echo $acc['product_id']; ?>">
                                    <button type="submit" class="btn btn-warning text-white">Add to Cart</button>
                                    

                                    </form>
                                <?php }
                             ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php


    

 // Fetch data from the "pencil" table
 $sql1 = "SELECT * FROM sketch_detail where type='Acrylic'";
 $result1 = mysqli_query($conn, $sql1);

// Store the fetched data in an array
$pencils1 = [];
while ($row1 = mysqli_fetch_assoc($result1)) {
    $pencils1[] = $row1;
}
?>
<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Arts</li>
                <li class="breadcrumb-item active" aria-current="page">Acrylic</li>

            </ol>
        </nav>

<div class="row text-center" id="acrylic">
    <?php foreach ($pencils1 as $acc) { ?>
        <div class="col-md-3 col-6 py-3">
            <div class="card">
                <img src="<?php echo $acc['image']; ?>" alt="" class="card-img-top">
                <div class="card-body">
                    <h6 class="card-title"><?php echo $acc['name']; ?></h6>
                    <h6 class="card-text">Price: $<?php echo $acc['price']; ?></h6>
                    <h6 class="card-text"><?php echo $acc['feature']; ?></h6>

                    <?php if (!isset($_SESSION['email'])) { ?>
                        <p><a href="index.php#login" role="button" class="btn btn-warning text-white">Add To Cart</a></p>
                    <?php } 
                       
                         else { ?>
                                    <form method="post" action="cart-add.php">
                                    <input type="hidden" name="product_id" value="<?php echo $acc['product_id']; ?>">
                                    <button type="submit" class="btn btn-warning text-white">Add to Cart</button>
                                    </form>                        <?php
                        }
                    
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php


    

// Fetch data from the "pencil" table
$sql2 = "SELECT * FROM sketch_detail where type='Canvas'";

$result2 = mysqli_query($conn, $sql2);

// Store the fetched data in an array
$pencils2 = [];
while ($row2 = mysqli_fetch_assoc($result2)) {
    $pencils2[] = $row2;
}
?>
<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Arts</li>
                <li class="breadcrumb-item active" aria-current="page">Canvas</li>

            </ol>
        </nav>

        <div class="row text-center" id="canvas">
    <?php foreach ($pencils2 as $canvas) { ?>
        <div class="col-md-3 col-6 py-3">
            <div class="card">
                <img src="<?php echo $canvas['image']; ?>" alt="" class="card-img-top">
                <div class="card-body">
                    <h6 class="card-title"><?php echo $canvas['name']; ?></h6>
                    <h6 class="card-text">Price: $<?php echo $canvas['price']; ?></h6>
                    <h6 class="card-text"><?php echo $canvas['feature']; ?></h6>

                    <?php if (!isset($_SESSION['email'])) { ?>
                        <p><a href="index.php#login" role="button" class="btn btn-warning text-white">Add To Cart</a></p>
                    <?php } 
                        
                         else { ?>
                                    <form method="post" action="cart-add.php">
        <input type="hidden" name="product_id" value="<?php echo $canvas['product_id']; ?>">
        <button type="submit" class="btn btn-warning text-white">Add to Cart</button>
    </form>                        <?php
                        }
                     ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php


    

// Fetch data from the "pencil" table
$sql3 = "SELECT * FROM sketch_detail where type='Nature'";

$result3 = mysqli_query($conn, $sql3);

// Store the fetched data in an array
$pencils3 = [];
while ($row3 = mysqli_fetch_assoc($result3)) {
    $pencils3[] = $row3;
}
?>

<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Arts</li>
                <li class="breadcrumb-item active" aria-current="page">Nature</li>

            </ol>
        </nav>
<div class="row text-center" id="nature">
    
    <?php foreach ($pencils3 as $nature) { ?>
        <div class="col-md-3 col-6 py-3">
            <div class="card">
                <img src="<?php echo $nature['image']; ?>" alt="" class="card-img-top">
                <div class="card-body">
                    <h6 class="card-title"><?php echo $nature['name']; ?></h6>
                    <h6 class="card-text">Price: $<?php echo $nature['price']; ?></h6>
                    <h6 class="card-text"><?php echo $nature['feature']; ?></h6>

                    <?php if (!isset($_SESSION['email'])) { ?>
                        <p><a href="index.php#login" role="button" class="btn btn-warning text-white">Add To Cart</a></p>
                    <?php } 
                        
                         else { ?>
                            <form method="post" action="cart-add.php">
        <input type="hidden" name="product_id" value="<?php echo $nature['product_id']; ?>">
        <button type="submit" class="btn btn-warning text-white">Add to Cart</button>
    </form>
                        <?php
                        }
                     ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

      </div>
      <!--menu list ends-->
      <!-- footer-->
        <?php include 'includes/footer.php'?>
      <!--footer ends-->
 </body>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 <script>
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();
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
