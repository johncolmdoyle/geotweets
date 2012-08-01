<?php
require_once('config.php');
require_once($ROOT_DIR . '/models/User.php');
require_once($ROOT_DIR . '/models/TwitterUser.php');
require_once($ROOT_DIR . '/models/data/Connection.php');
require_once($ROOT_DIR . '/models/data/TwitterConnection.php');
?>
<html>
    <head>
        <title>GeoTweets</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" /> 
    </head>
    <body>
<?php
    if(isset($_POST["screenname"])) {
        include('views/search.php');
    }
    else {
        include('views/index.php');
    }
?>
    </body>
</html>
