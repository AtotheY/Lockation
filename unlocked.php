<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<meta name="description" content="">
    <meta name="author" content="">

<link rel="icon" href="../../favicon.ico">


<title>Flock | Account Unlocked</title>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$accnum = $_POST['acc'];
define ('DB_NAME', 'Lockation');
define ('DB_USER', 'root');
define ('DB_PASSWORD', '.....1');
define ('DB_HOST', 'localhost');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($conn -> connect_error)
{
  die("Connection failed: ". $conn ->connect_error);
}
$test = mysqli_query ($conn, "UPDATE account_information SET status = '0' WHERE account_number = '".$accnum."'");


?>

<!-- Bootstrap core CSS -->

<link href="css/bootstrap.min.css" rel="stylesheet">


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="main.css" rel="stylesheet">

<link href="main.css" rel="stylesheet">

<script src="../../assets/js/ie-emulation-modes-warning.js"></script>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

<!--[if lt IE 9]>

<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<![endif]-->

</head>

<body>
  <div data-role="page">
  <div data-role="header" data-position="fixed">
    <center><img src="header.png" style="width:140px;height:140px"></center>
  </div>
<!--Title><![endif]-->

<div class="container">
<h1><center>Account Unlocked</center></h1>
<h4><center>Your account has been unlocked. Hurray!</center></h4>

<!--Form><![endif]-->

<div class ="col-sm-12">
  <form action = "index.php">
    <button class="btn btn-lg btn-warning btn-block" type="submit">Back to Dashboard</button>
  </form>
</div>
 <!-- /container -->



<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
<div id="fixedfooter">Made for HackPrinceton 2016 | In collaboration with CapitalOne</div>
</body>


</html>
