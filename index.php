<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Lockation | Dashboard</title>

    <!-- Custom styles for this template -->
    <link href="main.css" rel="stylesheet">

  </head>

  <body>
    <div data-role="header" data-position="fixed" id="fixedheader">
      <center><img src="header.png"></center>
    </div>

    <h2 class="sub-header"><center>Dashboard</center></h2>
    <div class="container">
      <!--<iframe src="dashboard.html" width="100%" height="300" style="border:0" id="index"></iframe>-->
       <div class="table-responsive">
            <table class="table">
              <thead><tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Account Number</th>
                  <th>Twitter</th>
                  <th>Bank Account Number</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr></thead>
              <tbody><tr>
                  <td>Test</td>
                  <td>Test</td>
                  <td>0001</td>
                  <td>@anon_1</td>
                  <td>319483001</td>
                  <td>Ready</td>
                  <td><button class="btn btn-xs btn-warning" type = "button" id="transactionBtn" data-toggle="modal" data-target="#transactionForm">Create Transaction</button></td>
                </tr>
                <tr>
                  <td>Test</td>
                  <td>Test</td>
                  <td>0002</td>
                  <td>@anon_2</td>
                  <td>282930493</td>
                  <td>Locked</td>
                  <td><button class="btn btn-xs btn-warning" type = "button" id="transactionBtn" data-toggle="modal" data-target="#transactionForm">Create Transaction</button></td>
                <tr>
                  <td>Test</td>
                  <td>Test</td>
                  <td>0003</td>
                  <td>@anon_3</td>
                  <td>392019222</td>
                  <td>Waiting</td>
                  <td><button class="btn btn-xs btn-warning" type = "button" id="transactionBtn" data-toggle="modal" data-target="#transactionForm">Create Transaction</button></td>
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
                    <p><center>Create a transaction for @anon_1</center></p><p></p>
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


    <div id="fixedfooter">Made for HackPrinceton 2016</div>

  </body>
</html>
