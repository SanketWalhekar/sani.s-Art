<?php
require "conn.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skecth Order</title>
     <link rel="Stylesheet" href="p.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="styleeee.css">
   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php
            if (isset($_SESSION['added']) && $_SESSION['added']) {
                echo 'Swal.fire("Good job!", "Your Order is Successfully Submitted !", "success");';
                unset($_SESSION['added']); // Clear the session variable
            }
            ?>
        });
    </script>

</head>
<body>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500&display=swap" rel="stylesheet">
    </head>
    <?php
    include 'includes/header_menu.php';
    ?>
<div class="container" style="margin-top:65px; margin-bottom:160px">


    <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6 col-md-5 intro-section">
              <div class="brand-wrapper">
                <h1 style="color: rgb(233, 238, 241);">Sani's ART</h1>
                <br>
                <p class="intro-text" style="font-size: 20px; color: whitesmoke;">Get Your Beautiful Handmade Sketch<br> Get Your Customized Sketch By Filling Out This Order Form</p>
               
              </div>
              <div class="intro-content-wrapper">
               
                <p class="intro-text"></p>
                <a href="#!" class="btn btn-read-more" style="margin-bottom: 500px;">Read more</a>
              </div>
              <div class="intro-section-footer">
                <na class="footer-nav">
                  <a href=""><i class="uil uil-facebook" width="40px" height="40px"></i></a>
                  <a href="#!"><i class="uil uil-twitter"></i></a>
                  <a href="#!"><i class="uil uil-instagram-alt"></i></a>
                  

                </na>
              </div>
            </div>
            <div class="col-sm-6 col-md-5 form-section">
              <div class="login-wrapper">
                <h2 class="login-title" style="margin-top: 10px;">Fill Your Sketch Order Details</h2>
                <form action="sketch_data.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="email" class="sr-only">Name</label>
                    <input type="text" name="name" id="email" class="form-control" placeholder="Your Name">
                    
                  </div>
                  <div class="form-group mb-3">
                    <label for="password" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                  </div>
                
                  <div class="form-group mb-3">
                    <div class="small text-muted mt-2">Upload a photo for a sketch.</div>
                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="productPhoto">
                    
                  </div>


                  <hr>
                  <div class="form-group mb-3">

                    <select class="form-select form-select-lg mb-3" name="dropdown" id="dropdown" aria-label=".form-select-lg example">
                        <option selected style="color: gray;">Select paper size</option>
                        <option value="A5">A5</option>
                        <option value="A4">A4</option>
                        <option value="A3">A3</option>
                        <option value="A2">A2</option>
                      </select>
  
                    </div>

                          <hr>


                    <div class="form-group mb-3">


                      
                          <h6 class="mb-0">Sketch Framing</h6>
             <br>
                      
                        <div class="col-md-9 pe-5">
          
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" value="Sketch With Frame" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Sketch With Frame
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" value="Sketch without Frame" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Sketch Without Frame
                                </label>
                              
                              </div>

                        </div>

                        <hr>
                    <div class="form-group mb-3">
                     
                      <div class="small" style="color: black;">Any Requirements Or Questions Regarding Your Sketch Order</div>
                      <br>
                       <textarea id="w3review" name="requirement" rows="3" cols="35" placeholder="Such as frame color , Gift wrapping....etc"></textarea>

                    </div>

                    <hr class="mx-n3">
                    <div class="small" style="color: black;" >The price of your sketch order will be sent to you by Email</div>
        
                    <div class="px-5 py-4">
                      <button type="submit" name="submit" id="submit" class="btn  btn-lg" style="color:  rgb(255, 255, 255); background-color:  blueviolet;">Send Order</button>
                    </div>

                    
                   
                </form>           
               
              </div>

            </div>

          </div>
         </div>
       </div>
      </div>
          <?php include 'includes/footer.php'?>

     
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