<?php
require_once('../../../config.php');
require_once($ROOT_DIR . '/models/data/Connection.php');
require_once($ROOT_DIR . '/models/data/ConnectionFactory.php');
require_once($ROOT_DIR . '/models/data/TwitterConnection.php');

$connectionFactory = new ConnectionFactory();
$twitter = $connectionFactory->newConnection('twitter');

$twitter->setConsumerKey($TWITTER_CONSUMERKEY);
$twitter->setConsumerSecret($TWITTER_CONSUMERSECRET);
$twitter->setUserToken($TWITTER_USERTOKEN);
$twitter->setUserSecret($TWITTER_USERSECRET);

$twitter->createConnection();

print_r($twitter->getFollowers('SCREENNAME'));

$twitter->closeConnection();

?>
