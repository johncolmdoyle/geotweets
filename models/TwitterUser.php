<?php
class TwitterUser implements User {
    // protected variables
    protected $id;
    protected $name;
    protected $screenname;

    public function getID() {
        return $this->id;
    }

    public function setID($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getScreenName() {
        return $this->screenname;
    }

    public function setScreenName($screenname) {
        $this->screenname = $screenname;
    }
}
?>
