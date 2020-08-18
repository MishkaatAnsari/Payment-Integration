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

    <title>Thank You For Donation</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="container">

      <div class="page-header">
        
        <center><p class="lead" style=color:black>THANKYOU FOR YOUR DONATION TO CARE CLUB</p></center>
      </div>

      <center><strong><h3 style="color:#6da552">Payment Done Sucessfully!!</h3> </strong></center>
   
    <p> Thank you for your support. Your donation will be generously used to help children with education, health care and other necessary supplies.
</p>

 <?php

include 'instamojo/Instamojo.php';

$api = new Instamojo\Instamojo('test_6307740dfc356388586fed5bebb', 'test_f3b5d70d365aff665e95011e155','https://test.instamojo.com/api/1.1/');

$payid = $_GET["payment_request_id"];


try {
    $response = $api->paymentRequestStatus($payid);
?>
    <table class="table table-bordered">
      <tr>
        <th>Payment ID: </th>
        <td><?= $response['payments'][0]['payment_id']; ?></td>
      </tr>
      <tr>
        <th>Payment Amount: </th>
        <td><?= $response['payments'][0]['amount']; ?></td>
      </tr>
      <tr>
        <th>Payment Name: </th>
        <td><?= $response['payments'][0]['buyer_name']; ?></td>
      </tr>
      <tr>
        <th>Payment Email: </th>
        <td><?= $response['payments'][0]['buyer_email']; ?></td>
      </tr>
    </table>
    

    <?php
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}



  ?>


      
    </div> <!-- /container -->




  </body>
</html>
