<?php
session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Flock | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="\css\bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="main.css" rel="stylesheet">

  </head>

  <body>
    <div data-role="header" data-position="fixed" id="fixedheader">
      <center><img src="header.png" style="width:140px;height:140px"></center>
    </div>

    <h2 class="sub-header"><center>Dashboard</center></h2>
    <div class="container">
      <!--<iframe src="dashboard.html" width="100%" height="300" style="border:0" id="index"></iframe>-->
      <p>Protect yourself from credit card fraud easily and on the go with the help of Twitter and Capital One.</p>
       <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th align = 'center' valign = 'middle'>First Name</th>
                  <th align = 'center' valign = 'middle'>Last Name</th>
                  <th align = 'center' valign = 'middle'>Account Number</th>
                  <th align = 'center' valign = 'middle'>Twitter</th>
                  <th align = 'center' valign = 'middle'>Bank Account Number</th>
                  <th align = 'center' valign = 'middle'>Status</th>
                  <th align = 'center' valign = 'middle'>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
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
                $test = mysqli_query ($conn, "SELECT * FROM account_information");

                  while($row = mysqli_fetch_array($test)){
                  $first = $row['first_name'];
                  $last = $row['last_name'];
                  $phone = $row['phone_number'];
                  $twit = $row['twitter_account'];
                  $acc = $row['account_number'];
                  $msg = $row['status'];
                  if ($msg == 0)
                  {
                    $status = "Available";
                  }
                  else if ($msg == 1)
                  {
                    $status = "Awaiting Verification";
                  }
                  else
                    $status = "Account Locked";

                  echo"<tr>";
                  echo"<td align = 'center' valign = 'middle'> ".$first." </td>";
                  echo"<td align = 'center' valign = 'middle'> ".$last." </td>";
                  echo"<td align = 'center' valign = 'middle'> ".$phone." </td>";
                  echo"<td align = 'center' valign = 'middle'> ".$twit." </td>";
                  echo"<td align = 'center' valign = 'middle'> ".$acc." </td>";
                  echo"<td align = 'center' valign = 'middle'> ".$status." </td>";
                  if ($msg == 0)
                  {

                    echo"<td><form action ='transaction.php' method='post'/><div class = 'buttonHolder'><button type = 'submit' value = '".$acc."' class='btn btn-xs btn-warning' name ='acc'>Create Transaction</button></div></form></td></tr>";

                  }
                  else if ($msg == 1)
                    echo"<td><form action = 'unwait.php' method = 'post'><button class='btn btn-xs btn-warning' value = '".$acc."' name = 'acc' type='submit'>Clear Waiting</button></form></td></tr>";
                  else
                  {
                        echo"<td><form action ='unlocked.php' method='post'/><button class='btn btn-xs btn-warning' name = 'acc' value = '".$acc."'type='submit'>Unlock Account</button></form></td></tr>";
                  }
                }
                mysqli_close($conn);
                ?>
              </tbody>
            </table>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="transactionForm" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Enter Transaction</h4>
                </div>
                <div class="modal-body">
                  <?php
                    $accnum = $_POST['acc'];
                    echo $accnum;
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

              </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-default" data-dismiss="modal">Submit</button>
                </div>
              </div>

            </div>
          </div>

        </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


    <div id="fixedfooter">Made for HackPrinceton 2016 | In collaboration with CapitalOne</div>
