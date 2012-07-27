<?php

class UserFactory {
    protected $TWITTER = 'twitter';

    public function newUser($userType) {
        switch($userType) {
            case $this->TWITTER:
                return new TwitterUser();
                break;
            default:
                throw new Exception('Unknow user type : ' + $userType); 
        }
    }
}
?>
