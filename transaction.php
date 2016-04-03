<?php
session_start();
?>
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

<!-- [endif]-->

</head>

<body>
  <div data-role="header" data-position="fixed" id="fixedheader">
    <center><img src="header.png"></center>
  </div>
<!--Title><![endif]-->

<div class="container">
<h2><center>New Transaction</center></h2>

<?php
  $accnum = $_POST['acc'];
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

  $test = mysqli_query ($conn, "SELECT * FROM account_information WHERE account_number = '".$accnum."'");
  $row = $test->fetch_assoc();
  echo "<h4><center>Create a transaction for Account # ".$row['account_number'].", Phone #: ".$row['phone_number'].", Twitter ID ".$row['twitter_account'].".</center></h4>";
?>


<!--Form><![endif]-->
<form action = 'twitterCheck.php' method = 'post'>

	<div class="col-sm-12">
	<div class="form-group">
		<label for="clientname" class="sr-only">Name</label>
		<input type="text" id="clientname" name = "clientname" class="form-control" placeholder="Full Name" required="true">
	</div>
</div>

  <div class="col-sm-4">
	<div class="form-group">
		<label for="transactamt" class="sr-only">Transaction Value</label>
		<input type="number" id="transactamt" class="form-control" name = "transactamt" placeholder="Transaction Value" required="true">
	</div>
  </div>

  <div class ="col-sm-8">
	<div class="form-group">
		<label for="transactloc" class="sr-only">Transaction Location</label>
		<input type="text" id="transactloc" name="transactloc" class="form-control" placeholder="Location" required="true">
	</div>
</div>

<div class="col-sm-4">
<div class="form-group">
  <label for="transactdate" class="sr-only">Transaction Date</label>
  <input type="date" id="transactdate" name = "transactdate" class="form-control" placeholder="Date" required="true">
</div>
</div>

<div class ="col-sm-8">
<div class="form-group">
  <label for="transacttime" class="sr-only">Transaction Time</label>
  <input type="time" id="transacttime" name = "transacttime" class="form-control" placeholder="Time" required="true">
</div>
</div>
<input type="submit" value="Submit">

<?php
$accnum = $_POST['acc'];
$_SESSION["acc"] = $accnum;

 ?>
</form>
 <!-- /container -->



<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

<div id="fixedfooter">Made for HackPrinceton 2016</div>

</body>


</html>
