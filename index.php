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
            <?php
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

              var_dump($test);
            /*
              $sql = 'SELECT first_name, last_name, phone_number, account_number, twitter_account, status FROM account_information';
                mysql_select_db('Lockation');
                $retval = mysql_query( $sql, $conn );
              if(! $retval ){
                die('Could not get data: ' . mysql_error());
              }
              while($row = mysql_fetch_assoc($retval)) {
                echo "{$row['first_name']}  <br>".
                echo "{$row['last_name']} <br>".
                echo "{$row['phone_number']} <br> ".
                echo "{$row['account_number']} <br> ".
                echo "{$row['twitter_account']} <br> ".
                echo "{$row['status']} <br> ".
              }
              echo "Fetched data successfully\n";
              mysql_close($conn);
              */?>
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

                 <!--<tr>
                  <td><?php //echo $first; ?></td>
                  <td><?php //echo $last; ?></td>
                  <td><?php //echo $phone; ?></td>
                  <td><?php //echo $acc; ?></td>
                  <td><?php //echo $twit; ?></td>
                  <td><?php //echo $status; ?></td>
                 <td><button class="btn btn-xs btn-warning" type="submit">Create Transaction</button></td>
               </tr> -->

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
