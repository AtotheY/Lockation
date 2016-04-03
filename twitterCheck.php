<?php

function checkTweet()
{


require_once('TwitterAPIExchange.php');
ini_set('display_errors', 1);
ini_set('display_start;
up_errors', 1);
error_reporting(E_ALL);
$settings = array(
    'oauth_access_token' => "	962554652-W3uFUXOMI6UYffcRTConjYBDY3QkcbqH6QBjqE0u",
    'oauth_access_token_secret' => "DaurNka3j8r9Yc6ALwIxMJdyJZLFGdVhweIRHnosL31Jw",
    'consumer_key' => "KdRTI0oBAIk94w7PiofD0cmo7",
    'consumer_secret' => "xIN5Musw80Rlip31To4Gnfx4cZUm2KEoH500hkoLoUL7gmil1y
"
);

  echo "TEST";
		//setting up OAUTH info
		// getting user Id's from previous page
		$handle = '&screen_name=' . $_POST['acc'];
    echo "TEST2: handle : ". $handle;
  	$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
		$getfield = '?screen_name='.$handle;
		$requestMethod = 'GET';

    $twitter = new TwitterAPIExchange($settings);
    $result =  $twitter->setGetfield($getfield)
      ->buildOauth($url, $requestMethod)
      ->performRequest();
      var_dump($result);
}
	?>
