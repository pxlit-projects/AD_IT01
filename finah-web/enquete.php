<!DOCTYPE html>
<html>
    <head>
        <title>FINAH-NAH</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="javascript/jquery-1.11.2.min.js"></script>
        <script src="javascript/javascript.js"></script>
        <script src="javascript/general.js"></script>
        <link rel="stylesheet" type="text/css" href="css/customBootstrap.css">
		<link rel="icon" type="image/png" href="images/logo/logo.png">
    </head>
    <body>
        <?php
            session_start();
            if(!isset($_SESSION['username'], $_SESSION['password']))
            {
                echo '<script language="JavaScript"> window.location.href ="index.php" </script>';
            }
            include 'html/enqueteNav.html';
        ?>
    </body>
</html>