<?php

require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST["order_id"];

    $sql = "UPDATE sketch_order SET status=2 WHERE order_id='$order_id'";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   
  
   body, html {
  height: 100%;
  margin: 0;
}

h1{
  color:#fff;
}
h3{
  text-align:left;
}

.bg-opacity{
    position: relative;
    background-color: #000;
  background-image: url("upload/Home.png");

  height: 100%; 

  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}

.bg-opacity::before{
    content: ' ';
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
    opacity: 0.5;
    background:       url("All Images/Home.png") no-repeat center center;
    background-size: cover

  
  
}

.content{
  position: relative;
  width: 100%;
  height: 600px;
}

.card {
    width: 30%;
    height: 80%;
    display: flex;
    flex-direction: column;
   margin-left: 450px;
    background-color: #fff;
}

.header {
    height: 30%;
    
    color: rgb(189, 119, 232);
    text-align: center;
}

.container {
    padding: 2px 16px;
}

</style>
<body>
    

    <div class="bg-opacity">
        <div class="content">
           

            <div class="card">
                <div class="header">
                    <h2>THANK YOU FOR YOUR ORDER !</h2>
                    <br>
                    <hr>
                </div>
                    <div class="container">
                    <h3>Thank you for choosing Sani.s Art for your custom sketch. Your trust is greatly appreciated. I'm excited to create something special for you.</h3>
                    <h3>Warm Regards</h3>
                    <h3>Sani.s Art</h3>

        
  
                </div>
                 </div>
          </div>
 
 </div>
</body>
</html>


    

