<?php
class TwitterUser implements User {
    // protected variables
    protected $id;
    protected $name;
    protected $screenname;
    protected $description;
    protected $geoEnabled;
    protected $location;

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function isGeoEnabled() {
        return $this->geoEnabled;
    }

    public function setGeoEnabled($geoEnabled) {
        $this->geoEnabled = $geoEnabled;
    }

    public function getLocation() {
        return $this->location;
    }

    public function setLocation($location) {
        $this->location = $location;
    }
    
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
