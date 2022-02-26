<?php
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$search = $_REQUEST["search"];
$lat = $_REQUEST["lat"];
$lon = $_REQUEST["lon"];
$settings = array(
    'oauth_access_token' => "1163653008238030848-nrGkWomTIcNd1Xg2UUPqzw32d2t5sj",
    'oauth_access_token_secret' => "v178z493F3dLveWWkzRmb7I8GSJCmZTG0JFhUuM2VGRwA",
    'consumer_key' => "va8Yewr74qdE1tqq9TPMrQiM7",
    'consumer_secret' => "bMLY2zh8QI8zGMPwxgYE1BbdPyFbjJTru1mpPaouKQU4qzvD2I"
);

require_once('TwitterAPIExchange.php');

$url = "https://api.twitter.com/1.1/search/tweets.json";
 
$requestMethod = "GET";
 
$getfield = '?q=#' . $search;
$langlong = $lat . "," . $lon;
$radius = ',1000mi';
$geocode = 'geocode=' . $langlong . $radius;
$count = 'count=100';
$getfield .= '&' . $geocode . '&' . $until . '&' . $count;
$twitter = new TwitterAPIExchange($settings);

$result = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
echo $result;
?>
