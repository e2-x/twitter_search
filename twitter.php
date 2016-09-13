<?php 

require "autoload.php";//Path to twitteroauth library you downloaded in step 3
require "TwitterOAuth.php";

use TwitterOAuth\TwitterOAuth;



$twitteruser = "e2_xo"; //user name you want to reference
$notweets = 2; //how many tweets you want to retrieve
$consumerkey = ""; //Noted keys from step 2
$consumersecret = ""; //Noted keys from step 2
$accesstoken = ""; //Noted keys from step 2
$accesstokensecret = ""; //Noted keys from step 2
$searchTweets = "Hello World";
$header = "https://api.twitter.com/1.1/search/tweets.json&oauth_consumer_key=Zuo8dAzThSzzXvy5E8ng4CJBS&oauth_nonce=12965e2f4451bbe47c6c39b4fcbbaf42&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1459369906&oauth_token=2293634822-fLD1BLN30BOFMAIyIxnDgldoFWWWoyzJKeAMV5G&oauth_version=1.0&q=%23helloworld";
$query = "hellothere";

define('CONSUMER_KEY', getenv('CONSUMER_KEY'));
define('CONSUMER_SECRET', getenv('CONSUMER_SECRET'));
define('OAUTH_CALLBACK', getenv('OAUTH_CALLBACK'));

function getConnectionWithAccessToken($consumerkey,$consumersecret,$accesstoken,$accesstokensecret){

$connection = new TwitterOAuth($consumerkey,$consumersecret,$accesstoken,$accesstokensecret);
 	return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey,$consumersecret,$accesstoken,$accesstokensecret);
// $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
// $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));

$content = $connection->get("statuses/home_timeline");
$tweets = $connection->get("search/tweets",array("q"=>'$aapl AND down'));
$userTimeline = $connection->get("statuses/user_timeline",array("screen_name"=>"$twitteruser"));
$verify = $connection->get("account/verify_credentials");
// var_dump($content[0]);
//var_dump($request_token);

//Loop through queried tweets
foreach($tweets->statuses as $tweet){
// var_dump($tweet->text);
var_dump($tweet->text." : ".$tweet->created_at);
// //var_dump($tweets->statuses[$i]->text);
}

//Loop through user tweets
foreach($userTimeline as $timeline){
//print_r("$timeline->text<br>");
}
?>
