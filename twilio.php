<?php

require "twilio/Services/Twilio.php";

// set your AccountSid and AuthToken from www.twilio.com/user/account
$AccountSid = "AC70060670cfbc85d945944e261847ae08";
$AuthToken = "113c57402a318e6335b997b2614a6217";

$client = new Services_Twilio($AccountSid, $AuthToken);

$message = $client->account->sendMessage->create(array(
    "From" => "2267741587",
    "To" => "4163199283",
    "Body" => "Test message!",
));

// Display a confirmation message on the screen
echo "Sent message {$message->sid}";
?>
