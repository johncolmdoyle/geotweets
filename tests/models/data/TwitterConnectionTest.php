<?php
require_once('../../../models/data/Connection.php');
require_once('../../../models/data/ConnectionFactory.php');
require_once('../../../models/data/TwitterConnection.php');

$connectionFactory = new ConnectionFactory();
$twitter = $connectionFactory->newConnection('twitter');

$twitter->setConsumerKey('CONSUMERKEY');
$twitter->setConsumerSecret('CONSUMERSECRET');
$twitter->setUserToken('USERTOKEN');
$twitter->setUserSecret('USERSECRET');

$twitter->createConnection();

print_r($twitter->getFollowers('SCREENNAME'));

$twitter->closeConnection();

?>
