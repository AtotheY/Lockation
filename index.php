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

    <title>Lockation | Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="\css\bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="\css\ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="main.css" rel="stylesheet">

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
          <h2 class="sub-header"><center>Dashboard</center></h2>
          <div class="container">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Account Number</th>
                  <th>Twitter</th>
                  <th>Bank Account Number</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Test</td>
                  <td>Test</td>
                  <td>0001</td>
                  <td>@anon_1</td>
                  <td>319483001</td>
                  <td>Ready</td>
                  <td>

                    <?php
                      define ('DB_NAME', 'Lockation');
                      define ('DB_USER', 'root');
                      define ('DB_PASSWORD', '.....1');
                      define ('DB_HOST', 'localhost');
                      error_reporting(E_ALL);
                      ini_set('display_errors', 1);
                      $conn = new mysqli(DB_HOST, DB_USER , DB_PASSWORD, DB_NAME);
                      if ($conn -> connect_error)
                      {
                      	die("Connection failed: :" . $conn-> conect_error);
                      }
                      else
                        echo "Success!";

                      $pull = mysqli_query( $conn, "SELECT * FROM account_information WHERE account_number = 123456789");
                      $data = $pull->fetch_assoc();
                      echo $data['first_name'];
                      echo "DOESN't WORK";
                    ?>
                    <form action ="denied.php" method="post" >
		                    <button type ="submit"> Make Transaction </button>
		                </form>
		              </td>
                </tr>
                <tr>
                  <td>Test</td>
                  <td>Test</td>
                  <td>0002</td>
                  <td>@anon_2</td>
                  <td>282930493</td>
                  <td>Locked</td>
                  <td><button class="btn btn-xs btn-warning" type="submit">Create Transaction</button></td>
                </tr>
                <tr>
                  <td>Test</td>
                  <td>Test</td>
                  <td>0003</td>
                  <td>@anon_3</td>
                  <td>392019222</td>
                  <td>Waiting</td>
                  <td><button class="btn btn-xs btn-warning" type="submit">Create Transaction</button></td>
                </tr>
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
