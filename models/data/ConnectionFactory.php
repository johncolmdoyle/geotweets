<?php

class ConnectionFactory {
    protected $MYSQL = 'mysql';
    protected $TWITTER = 'twitter';
    protected $GEOCACHE = 'geocache';

    public function newConnection($databaseType) {
        switch($databaseType) {
            case $this->MYSQL:
                return new MYSQLConnection();
                break;
            case $this->TWITTER:
                return new TwitterConnection();
                break;
            case $this->$GEOCACHE:
                return new GeoCacheConnection();
                break;
            default:
                throw new Exception('Unknown database type : ' + $databaseType); 
        }
    }
}
?>
