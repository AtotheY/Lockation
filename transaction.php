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


<title>Lockation | Create Transaction</title>


<!-- Bootstrap core CSS -->

<link href="css/bootstrap.min.css" rel="stylesheet">


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="C:\Users\Susie\Documents\Lockation\css\bootstrap.min.css" rel="stylesheet">

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
    <center><img src="header.png"></center>
  </div>
<!--Title><![endif]-->

<div class="container">
<h2><center>New Transaction</center></h2>

<?php
  echo $_POST['acc'];
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  define ('DB_NAME', 'Lockation');
  define ('DB_USER', 'root');
  define ('DB_PASSWORD', '.....1');
  define ('DB_HOST', 'localhost');

  $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($conn -> connect_error)
  {
    die("Connection failed: ". $conn ->connect_error);
  }
  $test = mysqli_query ($conn, "SELECT * FROM account_information WHERE account_number = ".$_POST['acc']);
  var_dump($test);
?>

<h4><center>Create a transaction for Account #, Phone #: , Bank Account ###.</center></h4>

<!--Form><![endif]-->
<form role="form">

	<div class="col-sm-12">
	<div class="form-group">
		<label for="clientname" class="sr-only">Name</label>
		<input type="text" id="clientname" class="form-control" placeholder="Full Name">
	</div>
</div>

  <div class="col-sm-4">
	<div class="form-group">
		<label for="transactamt" class="sr-only">Transaction Value</label>
		<input type="number" id="transactamt" class="form-control" placeholder="Transaction Value">
	</div>
  </div>

  <div class ="col-sm-8">
	<div class="form-group">
		<label for="transactloc" class="sr-only">Transaction Location</label>
		<input type="text" id="transactloc" class="form-control" placeholder="Location">
	</div>
</div>

<div class="col-sm-4">
<div class="form-group">
  <label for="transactdate" class="sr-only">Transaction Date</label>
  <input type="date" id="transactdate" class="form-control" placeholder="Date">
</div>
</div>

<div class ="col-sm-8">
<div class="form-group">
  <label for="transacttime" class="sr-only">Transaction Time</label>
  <input type="time" id="transacttime" class="form-control" placeholder="Time">
</div>
</div>

</form>
<div class ="col-sm-12">
  <button class="btn btn-lg btn-warning btn-block" type="submit">Create Transaction</button>
</div>
 <!-- /container -->



<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</body>


</html>
