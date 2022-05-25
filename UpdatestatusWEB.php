<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ESP WEB Server</title>
</head>

<body>
  <style>
    h1 {
      color: green;
      font-size: 70px;
    }

    .button {
      background-color: gray;
      /* Green */
      border: none;
      color: white;
      padding: 16px 40px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 100px;
      margin: 20px 2px;
      cursor: pointer;
      outline: none;
      border-radius: 15px;
      box-shadow: 0 9px #999;
    }

    .btnon:hover {
      background-color: #3e8e41
    }

    .btnoff:hover {
      background-color: red
    }


    .button:active {
      background-color: #3e8e41;
      box-shadow: 0 5px #666;
      transform: translateY(15px);
    }

    .wrapper {
      text-align: center;
    }

    .btnon {
      padding: 15px 150px;
    }

    .btnoff {
      padding: 15px 178px;
    }
  </style>

  <form action="" method="POST">

    <div class="wrapper">
      <h1>Panny Tech</h1>
      <button class="button btnon" type="submit" name="ON">ON</button><br>
      <button class="button btnoff" type="submit" name="OFF">OFF</button>
    </div>

</body>

</html>

<?php

$server   = "localhost";  // Change this to correspond with your database port
$username   = "root";      // Change if use webhost online
$password   = "";
$DB     = "qlda";      // database name


$update = new mysqli($server, $username, $password, $DB);  // Check database connection
if ($update->connect_error) {
  die("Connection failed: " . $update->connect_error);
}


if (isset($_POST['ON']))      // If press ON
{

  $sql = "UPDATE status SET status = 1";

  // If don't put this If , we can't change the value in database
  if ($update->query($sql) === TRUE) {
    //$_GET[] = 1;						
  }
}

if (isset($_POST['OFF']))    // If press OFF
{

  $sql = "UPDATE status SET status = 0"; 
  
  // Echo "0" , equivalent with send data to App to toast OFF
  if ($update->query($sql) === TRUE) {  // Because it's been a long time , so i forgot
    //$_GET[] = 0;						// why i have to put this line but it still run when it's commented
  }
}
?>