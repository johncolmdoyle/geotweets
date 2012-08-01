<?php
require_once($ROOT_DIR . '/models/data/tmhOAuth.php');

class TwitterConnection implements Connection {
    // protected variables
    protected $consumerKey;
    protected $consumerSecret;
    protected $userToken;
    protected $userSecret;
    protected $connection;
    protected $config;
    protected $cursor = '-1';
    protected $limit;

    const APIHOST = 'api.twitter.com';
    const VALIDHTTPCODE = 200;

    public function getConsumerKey() {
        return $this->consumerKey;
    }

    public function setConsumerKey($consumerKey) {
        $this->consumerKey = $consumerKey;
    }

    public function getConsumerSecret() {
        return $this->consumerSecret;
    }

    public function setConsumerSecret($consumerSecret) {
        $this->consumerSecret = $consumerSecret;
    }

    public function getUserToken() {
        return $this->userToken;
    }

    public function setUserToken($userToken) {
        $this->userToken = $userToken;
    }

    public function getUserSecret() {
        return $this->userSecret;
    }

    public function setUserSecret($userSecret) {
        $this->userSecret = $userSecret;
    }

    public function getCursor() {
        return $this->cursor;
    }

    public function createConnection() {
        $this->connection = new tmhOAuth(
            array(
                'consumer_key' => $this->consumerKey,
                'consumer_secret' => $this->consumerSecret,
                'user_token' => $this->userToken,
                'user_secret' => $this->userSecret
            )
        );
    }

    public function setLimit() {
        $response = $this->connection->response;
        $headers = $response['headers'];
        $this->limit = $headers['x_ratelimit_remaining'];
    }

    public function getLimit() {
        return $this->limit;
    }

    protected function isGoodResponse() {
        $http_code = $this->connection->response['code'];

        if ($http_code == TwitterConnection::VALIDHTTPCODE) {
            return true;
        }

        return false;
    }

    public function getFollowers($user) {
        $this->connection->request(
            'GET', 
            $this->connection->url('1/followers/ids'), 
            array(
                'screen_name' => $user,
                'cursor' => $this->cursor
            )
        );

        if ($this->isGoodResponse()) {
            $this->setLimit();
            return json_decode($this->connection->response['response'], true);
        }
        else {
            throw new Exception('Twitter connection exception - bad response for getFollowers:' + $this->connection->response['code']);
        }
        
    }

    
    public function closeConnection() {
        return true;
    }
}
?>
