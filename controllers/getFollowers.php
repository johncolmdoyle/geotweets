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

$followerResponse = array();
$followerResponse = $twitter->getFollowers($_POST["screenname"]);

$followerIDList = $followerResponse['ids'];

forearch($followerIDList as $twitterID) {

    $userResponse = array();
    $userResponse = $twitter->userLookup($twitterID);

    foreach($userResponse as $userObject ) {

        $twitterUser = new TwitterUser();
        $twitterUser->setID($twitterID);
        $twitterUser->setName($userObject['name']);
        $twitterUser->setDescription($userObject['description']);
        $twitterUser->setScreenName($userObject['screen_name']);
        $twitterUser->setLocation($userObject['location']);
        $twitterUser->setGeoEnabled($userObject['geo_enabled']);

        $mysql->insertTwitterUser($twitterUser);

    }

}

$mysql->closeConnection();
?>
