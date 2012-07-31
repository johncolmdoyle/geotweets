<?php
require_once('../../../models/data/Connection.php');
require_once('../../../models/data/ConnectionFactory.php');
require_once('../../../models/data/MYSQLConnection.php');

$connectionFactory = new ConnectionFactory();
$mysqlDB = $connectionFactory->newConnection('mysql');

$mysqlDB->setUser('USERNAME');
$mysqlDB->setDatabase('DATABASE');
$mysqlDB->setServer('SERVER');
$mysqlDB->setPassword('PASSWORD');

$mysqlDB->createConnection();

$mysqlDB->closeConnection();

?>
