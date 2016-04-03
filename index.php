<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Lockation | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="\css\bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="main.css" rel="stylesheet">

  </head>

  <body>
    <div data-role="page">
    <div data-role="header" data-position="fixed">
      <center><img src="header.png"></center>
    </div>
          <h2 class="sub-header"><center>Dashboard</center></h2>
          <div class="container">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Fisrt Name</th>
                  <th>Last Name</th>
                  <th>Account Number</th>
                  <th>Twitter</th>
                  <th>Bank Account Number</th>
                  <th>Status</th>
                  <th>Action</th>
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
                    $status = "Create Transaction";
                  }
                  else if ($msg == 1)
                  {
                    $status = "Awaiting Verification";
                  }
                  else
                    $status = "Account Locked";

                  echo"<tr>";
                  echo"<td> ".$first." </td>";
                  echo"<td> ".$last." </td>";
                  echo"<td> ".$phone." </td>";
                  echo"<td> ".$twit." </td>";
                  echo"<td> ".$acc." </td>";
                  echo"<td> ".$status." </td>";
                  if ($msg == 0)
                  {
                    echo"<td><form action ='transaction.php' method='post'/><button type = 'submit' value = '".$acc."class='btn btn-xs btn-warning' name ='acc'>Create Transaction</button>
                    </form></td></tr>";
                  }
                  else if ($msg == 1)
                    echo"<td><button class='btn btn-xs btn-warning' type='submit'>Clear Waiting</button></td></tr>";
                  else
                  {
                        echo"<td><form action ='unlocked.php' method='post'/><button class='btn btn-xs btn-warning' type='submit'>Unlock Account</button></form></td></tr>";
                  }
                }
                mysqli_close($conn);
                ?>
              </tbody>
            </table>
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
  </body>
</html>
