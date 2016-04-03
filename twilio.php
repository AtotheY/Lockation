<?php
session_start();
?>
<?php

require "twilio/Services/Twilio.php";

// set your AccountSid and AuthToken from www.twilio.com/user/account
$AccountSid = "AC70060670cfbc85d945944e261847ae08";
$AuthToken = "113c57402a318e6335b997b2614a6217";

$client = new Services_Twilio($AccountSid, $AuthToken);

$message = $client->account->messages->create(array(
    "From" =>"4387938609",
    "To" => $_SESSION['phone'],
    "Body" => "Hey from Capital One! A recent transaction has been flagged as suspicious. Please reply with 'yes' or 'no' to whether or not you authorized the following
    transaction: ".$_SESSION['date'] ." at ". $_SESSION['time'] ." for $" . $_SESSION['val'] . " in " . $_SESSION['last'],
));

// Display a confirmation message on the screen
echo "Sent message {$message->sid}";
?>
