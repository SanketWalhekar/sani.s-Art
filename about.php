<?php
require ("includes/common.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>sani.s Art</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="styleeee.css">
</head>
<body style="overflow-x:hidden; padding-bottom:100px;">
  <?php
        include 'includes/header_menu.php';
    ?>
  <div>
    <div class="container mt-5 ">
      <div class="row justify-content-around">
        <div class="col-md-5 mt-3">
          <h3 class="text-warning pt-3 title">About Sani's Art Gallery</h3>
          <hr />
          
          <p class="mt-2">Welcome to Sani's Art Gallery, where creativity and passion converge to create an artistic sanctuary. Our gallery is more than just a place to admire art; it's a haven for art enthusiasts, a testament to human creativity, and a journey through the world of emotions and imagination..</p>
          <h3 class="text-warning pt-3 title">Our Story</h3>
          <hr />
          <p class="mt-2">Sani's Art Gallery was founded with a singular vision: to make art accessible to all and celebrate the profound impact it has on our lives. Our story began with a deep love for art and an unwavering belief in its power to inspire, heal, and connect people. We embarked on a mission to curate an exceptional collection of artworks that would touch hearts and souls.</p>
          
        </div>
        
        <div class="col-md-5 mt-3">
          <span class="text-warning pt-3">
            <br>
            
            <h3>Our Collection</h3>
          </span>
          <hr/>
          <p>Step into our gallery, and you'll find an exquisite array of artistic expressions. From stunning canvas paintings that capture the essence of nature to mesmerizing acrylic masterpieces that evoke emotions, our collection spans a diverse range of styles and themes. Each artwork on display tells a unique story and invites you to explore the world of the artist's imagination.
          </p>
          <h3 class="text-warning pt-3 title">Our Mission</h3>
          <hr/>
          <p>Our mission is simple yet profound: to ignite a passion for art in every individual who walks through our doors or visits our online gallery. We believe that art has the power to transcend boundaries, spark conversations, and inspire change. Through exhibitions, workshops, and community engagement, we strive to make art an integral part of people's lives</p>

        </div>
      </div>
    </div>
  </div>
  <div class="container pb-3">
  </div>
  <div class="container mt-3 d-flex justify-content-center card pb-3 col-md-6">

    <form class="col-md-12" method="POST" name="_next">
      <h3 class="text-warning pt-3 title mx-auto">Contact Form</h3>
      <div class="form-group">
        <label for="exampleFormControlInput1">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email"
          name="email" required>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Message</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="5" required></textarea>
      </div>
      <input type="hidden" name="_next" value="http://localhost/foody/about.php" />
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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
  $(document).ready(function () {
    $('[data-toggle="popover"]').popover();
  });
  $(document).ready(function () {

    if (window.location.href.indexOf('#login') != -1) {
      $('#login').modal('show');
    }

  });
</script>
<?php if(isset($_GET['error'])){ $z=$_GET['error']; echo "<script type='text/javascript'>
$(document).ready(function(){
$('#signup').modal('show');
});
</script>"; echo "
<script type='text/javascript'>alert('".$z."')</script>";} ?>
<?php if(isset($_GET['errorl'])){ $z=$_GET['errorl']; echo "<script type='text/javascript'>
$(document).ready(function(){
$('#login').modal('show');
});
</script>"; echo "
<script type='text/javascript'>alert('".$z."')</script>";} ?>
</html>
<?php
require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; // Use 'ssl' if required by your SMTP server
        $mail->Port = 587; // Use the appropriate port for your SMTP server

        // SMTP authentication credentials
        $mail->Username = '18project03@gmail.com'; // Replace with your email address
        $mail->Password = 'qkiswsrxmprjxucb'; // Replace with your email password

        // Set sender and recipient
        $mail->setFrom($email, 'Sani.s Art');
        $mail->addAddress('18project03@gmail.com'); // Replace with the recipient's email address

        // Email subject and body
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "nEmail: $email\n\n$message";

        // Send the email
        if ($mail->send()) {
            echo '<script>swal("Good job!", "Message Send Successfully !", "success");</script>';
        } else {
            echo '<script>swal("Oops!", "Something went wrong, Retry Again!", "error");</script>';
        }
    } catch (Exception $e) {
        
        echo '<script>swal("Oops!", "Something went wrong, Retry Again!", "error");</script>';

    }
}
?>


