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
