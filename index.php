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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
     <link rel="stylesheet" href="styleeee.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['registration_success']) && $_SESSION['registration_success']) {
                echo 'Swal.fire("Good job!", "Registration Successfull!", "success");';
                unset($_SESSION['registration_success']); // Clear the session variable
            }
            ?>
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['login_success']) && $_SESSION['login_success']) {
                echo 'Swal.fire("Good job!", "Login Sucessfull!", "success");';
                unset($_SESSION['login_success']); // Clear the session variable
            }
            ?>
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['login_failed']) && $_SESSION['login_failed']) {
                echo 'Swal.fire("Oops!", "Incorrect Username and Password, Retry Again!", "error");';
                unset($_SESSION['login_failed']); // Clear the session variable
            }
            ?>
        });
    </script>
    <style>
        
    .painting-card {
        border-radius: 0.5rem;
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 400px;
        width: 300px;
        overflow: hidden;
    }

    .painting-card img {
        max-height: 100%;
        max-width: 100%;
        object-fit: cover;
    }

    .h5 {
        padding-top: 1rem;
        font-weight: bold;
    }
    .container
    {
        text-align:center;
    }
</style>

</head>
<body style="margin-bottom:200px">
    <!--Header-->
    <?php
include 'includes/header_menu.php';
include 'includes/check-if-added.php';
?>
    <!--Header ends-->
 <div id="content">
    
    <div class="container" style="padding-top: 150px;">
        <div class="mx-auto p-5 text-white" id="banner_content" style="border-radius: 0.5rem;">
            <center><h1>We sell Happiness :)</h1></center>
            <a href="products.php" class="btn btn-warning btn-lg text-white">Shop Now</a>
        </div>
    
</div>
    </div>
    <div class="text-center pt-4 h3">
        * Art Gallary *
    </div>
    <!--menu highlights start-->
    <div class="container pt-3">
    <div class="row text-center">
        <div class="col-6 col-md-3 py-3">
            <a href="products.php#canvas" class="painting-card">
                <img src="images/canvas.jpg" class="img-fluid" alt="Canvas Paintings">
                <div class="h5">Canvas Paintings</div>
            </a>
        </div>
        <div class="col-6 col-md-3 py-3">
            <a href="products.php#acrylic" class="painting-card">
                <img src="images/acrylic.jpg" class="img-fluid" alt="Acrylic Paintings">
                <div class="h5">Acrylic Paintings</div>
            </a>
        </div>
        <div class="col-6 col-md-3 py-3">
            <a href="products.php#nature" class="painting-card">
                <img src="images/nature.jpg" class="img-fluid" alt="Nature Paintings">
                <div class="h5">Nature Paintings</div>
            </a>
        </div>
        <div class="col-6 col-md-3 py-3">
            <a href="products.php#pencil" class="painting-card">
                <img src="images/pencil.jpg" class="img-fluid" alt="Pencil Paintings">
                <div class="h5">Pencil Paintings</div>
            </a>
        </div>
    </div>
</div>
    <!--menu highlights end-->
    <!--footer -->
    <?php include 'includes/footer.php'?>
    <!--footer end-->

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
    </body>
</html>