<?php
require_once($ROOT_DIR . '/models/User.php');
require_once($ROOT_DIR . '/models/TwitterUser.php');

class MYSQLConnection implements Connection {
    // protected variables
    protected $user;
    protected $password;
    protected $database;
    protected $server;
    protected $connection;
    protected $resource;

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getDatabase() {
        return $this->database;
    }

    public function setDatabase($database) {
        $this->database = $database;
    }

    public function getHost() {
        return $this->server;
    }

    public function setServer($server) {
        $this->server = $server;
    }

    public function createConnection() {
        $this->resource = mysql_connect($this->server, $this->username, $this->password);

        if (! $this->resource) {
           throw new Exception('Database resource exception: ' . mysql_error());
        }

        $this->connection = mysql_select_db($this->database, $this->resource);

        f (! $this->connection) {
           throw new Exception('Database connection exception: ' . mysql_error());
        } 
    }

    public function createUserTable() {
        $createTableDefinition = "CREATE TABLE geotweets_user (id INT, name VARCHAR(100), screenname VARCHAR(100), description VARCHAR(1000), geo_enabled CHAR(1), location VARCHAR(1000) );";

        $createTableReturn = mysql_query($createTableDefinition);
        if (! $createTableReturn) {
            throw new Exception('Database user table creation exception: ' . mysql_error());
        }
    }


    public function insertTwitterUser(TwitterUser $twitterUser) {
        if ( isset($twitterUser)) {
            $insertStatement = "INSERT INTO geotweets_user (id, name, screenname, description, geo_enabled, location) VALUES ('" . $twitterUser->getID() . "', '" . $twitterUser->getName() . "', '" . $twitterUser->getScreenName() . "', '" . $twitterUser->getDescription() . "', '" . $twitterUser->isGeoEnabled() . "', '" . $twitterUser->getLocation() . "');";

            $insertStatementReturn = mysql_query($insertStatement);

            if (! $insertStatementReturn ) {
                throw new Exception('Database user insert exception: ' . mysql_error());
            }
        }
    }


    public function createUserLocationTable() {
        $createTableDefinition = "CREATE TABLE geotweets_user_location (id INT, lng FLOAT(10,6), lat FLOAT(10,6), country VARCHAR(160), state VARCHAR(160), city VARCHAR(160));";

        $createTableReturn = mysql_query($createTableDefinition);
        if (! $createTableReturn) {
            throw new Exception('Database location table creation exception: ' . mysql_error());
        }
    }

    public function createUserRelationshipTable() {
        $createTableDefinition = "CREATE TABLE geotweets_user_relationship (id INT, followerID INT);";
    
        $createTableReturn = mysql_query($createTableDefinition);
        if (! $createTableReturn) {
            throw new Exception('Database relationship table creation exception: ' . mysql_error());
        }
    }

    public function closeConnection() {
        mysql_close($this->link);
    }
}
?>
