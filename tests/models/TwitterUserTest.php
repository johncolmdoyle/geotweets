<php
require_once('../models/User.php');
require_once('../models/TwitterUser.php');
require_once('../models/UserFactory.php');

class TwitterUserTest extends PHPUnit_Framework_TestCase {
    public function testID() {
        $userFactory = new UserFactory();

        $twitterUser = $userFactory('twitter');

        $twitterUser->setID(1);

        $this->assertEquals(1, $twitterUser->getID());
    }
}
?>
