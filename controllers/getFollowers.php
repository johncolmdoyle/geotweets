<?php

$connectionFactory = new ConnectionFactory();
$twitter = $connectionFactory->newConnection('twitter');
$mysql = $connectionFactor->newConnection('mysql');

$twitter->setConsumerKey($TWITTER_CONSUMER_KEY);
$twitter->setConsumerSecret($TWITTER_CONSUMER_SECRET);
$twitter->setUserToken($TWITTER_USER_TOKEN);
$twitter->setUserSecret($TWITTER_USER_SECRET);

$mysql->setUser($MYSQL_USERNAME);
$mysql->setPassword($MYSQL_PASSWORD);
$mysql->setServer($MYSQL_SERVER);
$mysql->setDatabase($MYSQL_DATABASE);

$twitter->createConnection();
$mysql->createConnection();

$followerResponse = $twitter->getFollowers($_POST["screenname"]);

$followerIDList = $followerResponse['ids'];

forearch($followerIDList as $twitterID) {
    $userResponse = $twitter->userLookup($twitterID);

    $twitterUser = new TwitterUser();
    $twitterUser->setID($twitterID);
    $twitterUser->setName($userResponse->name);
    $twitterUser->setDescription($userResponse->description);
    $twitterUser->setScreenName($userResponse->screenname);
    $twitterUser->setLocation($userResponse->location);
    $twitterUser->setGeoEnabled($userResponse->geo_enabled);

    $mysql->insertTwitterUser($twitterUser);
}

$mysql->closeConnection();
?>
