<?php

    include_once "conn.php";
    require 'PHPMailer.php';
    require 'SMTP.php';
    require 'Exception.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $email = 'sanketwalhekar83@email.com';
    $message = 'This is a test message';
    $order_id=$_POST['record'];
    //echo $order_id;
    $sql = "SELECT status from sketch_order where order_id='$order_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["status"]==0){
         $update = mysqli_query($conn,"UPDATE sketch_order SET status=1 where order_id='$order_id'");
       sendEmail($email, $message); 
          
        

    }
    else if($row["status"]==1){
         $update = mysqli_query($conn,"UPDATE sketch_order SET status=0 where order_id='$order_id'");
    }
    
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>




<?php

function sendEmail($email, $message) {
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
            return true; // Email sent successfully
        } else {
            return false; // Email sending failed
        }
    } catch (Exception $e) {
        return false; // Exception occurred
    }
}
?>