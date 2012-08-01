<?php
require_once('../../../config.php');
require_once($ROOT_DIR . '/models/data/Connection.php');
require_once($ROOT_DIR . '/models/data/ConnectionFactory.php');
require_once($ROOT_DIR . '/models/data/TwitterConnection.php');

$connectionFactory = new ConnectionFactory();
$twitter = $connectionFactory->newConnection('twitter');

$twitter->setConsumerKey($TWITTER_CONSUMER_KEY);
$twitter->setConsumerSecret($TWITTER_CONSUMER_SECRET);
$twitter->setUserToken($TWITTER_USER_TOKEN);
$twitter->setUserSecret($TWITTER_USER_SECRET);

$twitter->createConnection();

print_r($twitter->getFollowers('Art_Wolf'));

$twitter->closeConnection();

?>
