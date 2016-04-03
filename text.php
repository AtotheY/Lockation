<?php
session_start();
?>
<?php

require "twilio/Services/Twilio.php";

// set your AccountSid and AuthToken from www.twilio.com/user/account
$AccountSid = "AC70060670cfbc85d945944e261847ae08";
$AuthToken = "113c57402a318e6335b997b2614a6217";

$client = new Services_Twilio($AccountSid, $AuthToken);

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


if ($_REQUEST['Body']=="yes" || $_REQUEST['Body']=="Yes")
{
  $message = $client->account->messages->create(array(
      "From" =>"4387938609",
      "To" => "4169516071",
      "Body" =>  "Your account has been cleared! Stay safe, and thanks for choosing Capital One. ttest: ". $_REQUEST['From'].",
  ));
  $test = mysqli_query ($conn, "UPDATE account_information SET status = '0' WHERE phone_number = '".$_SESSION."'");


}
else if ($_REQUEST['Body']=="no" || $_REQUEST['Body']=="No")

{
  $message = $client->account->messages->create(array(
    "From" =>"4387938609",
    "To" => $_REQUEST['from'],
    "Body" =>  "Capital One's financial investigators have been notified and your account has been temporarily locked.",
));
$test = mysqli_query ($conn, "UPDATE account_information SET status = '2' WHERE phone_number = '".$_SESSION."'");

}
// Display a confirmation message on the screen
echo "Sent message {$message->sid}";
?>
