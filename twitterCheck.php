<?php
session_start();
?>
<?php
require_once('TwitterAPIExchange.php');
ini_set('display_errors', 1);
ini_set('display_start;
up_errors', 1);
error_reporting(E_ALL);
$settings = array(
    'oauth_access_token' => "962554652-W3uFUXOMI6UYffcRTConjYBDY3QkcbqH6QBjqE0u",
    'oauth_access_token_secret' => "DaurNka3j8r9Yc6ALwIxMJdyJZLFGdVhweIRHnosL31Jw",
    'consumer_key' => "KdRTI0oBAIk94w7PiofD0cmo7",
    'consumer_secret' => "xIN5Musw80Rlip31To4Gnfx4cZUm2KEoH500hkoLoUL7gmil1y"
);

$accnum = $_SESSION["acc"];
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
		// getting user Id's from previous page
		$handle =  $row['twitter_account'];

  	$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
		$getfield = '?screen_name='.$handle.'&include_rts=false';
		$requestMethod = 'GET';

    $twitter = new TwitterAPIExchange($settings);
    $result =  $twitter->setGetfield($getfield)
      ->buildOauth($url, $requestMethod)
      ->performRequest();

    $store1 = json_decode($result, true);
    //var_dump($store1);
    $done = false;
    $newPlace = "";
    foreach ($store1 as $row)
    {
      $geo = $row['geo'];
      $date = $row['created_at'];
      $place = $row['place'];
      if ($place != null)
      {
        echo "ANTHONY". " ". $place['name'];
        $newPlace = $place['name'];
        $done = true;
      }
      if ($done)
        break;
    }
    $userLoc =  $_POST['transactloc'];

    if ($userLoc != $newPlace)
    {
      include 'twilio.php';
    }
    else {

    }
	?>
