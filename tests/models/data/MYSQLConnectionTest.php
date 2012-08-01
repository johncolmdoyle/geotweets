<?php
require_once('../../../config.php');
require_once($ROOT_DIR . '/models/data/Connection.php');
require_once($ROOT_DIR . '/models/data/ConnectionFactory.php');
require_once($ROOT_DIR . '/models/data/MYSQLConnection.php');

$connectionFactory = new ConnectionFactory();
$mysqlDB = $connectionFactory->newConnection('mysql');

$mysqlDB->setUser($MYSQL_USERNAME);
$mysqlDB->setDatabase($MYSQL_DATABASE);
$mysqlDB->setServer($MYSQL_SERVER);
$mysqlDB->setPassword($MYSQL_PASSWORD);

$mysqlDB->createConnection();

$mysqlDB->closeConnection();

?>
