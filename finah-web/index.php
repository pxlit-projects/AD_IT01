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


		<script src="javascript/bootstrap.js"></script>
		<script src="javascript/freelancer.js"></script>
		<script src="javascript/own.js"></script>
		<link rel="stylesheet" type="text/css" href="css/freelancer.css">

        <script src="javascript/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="css/customBootstrap.css">
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		
		<link rel="icon" type="image/png" href="images/logo/logo.png">
    </head>
    <body onload="start()">
                <?php
                    session_start();
                    require_once 'medoo.min.php';
                    $database = new medoo();
                    /* Check if user is previously logged in */
                    if(isset($_SESSION['username'], $_SESSION['password']))
                    {
                        $user = $database->get(
                                    "users", "*", [
                                    "AND" => [
                                    "username" => $_SESSION['username'],
                                    "password" => $_SESSION['password']
                                    ]]);
                        if($user['rank'] > 9)
                            include 'html/logoutNavAdmin.html';
                        else
                            include 'html/logoutNav.html';
                        
						include 'php/googleTagManager.php';

                        if(isset($_GET['updatePass']))
                        {
                            if($_GET['updatePass'] == "true")
                            {
                                include 'html/updatePass.html';
                            }
                            else if($_GET['updatePass'] == "false")
                            {
                                include 'html/failedUpdatePass.html';
                            }
                        }
                        include 'php/userDetails.php';
                    }
                    /* User is not logged in yet */
                    /* Check if any post data is send */
                    else if(isset($_POST['username'], $_POST['password']))
                    {
                        $database = new medoo();

                        $username = $_POST['username'];
                        $password = md5($_POST['password']);

                        /* Check for correct username and password */
                        $dblogin = $database->count("users", [
                                    "AND" => [
                                    "username" => $username,
                                    "password" => $password
                                    ]]);

                        /* Incorrect username and / or password */
                        if($dblogin == 0)
                        {
                            include 'html/loginNav.html';
                            include 'html/failedLogin.html';
                            include 'html/loginForm.html';
							include 'php/googleTagManager.php';
                        }
                        else
                        {
                            $_SESSION['username'] = $username;
                            $_SESSION['password'] = $password;

                            $user = $database->get(
                                    "users", "*", [
                                    "AND" => [
                                    "username" => $username,
                                    "password" => $password
                                    ]]);
                            if($user['rank'] > 9)
                                include 'html/logoutNavAdmin.html';
                            else
                                include 'html/logoutNav.html';
                            include 'html/correctLogin.html';
                            include 'php/userDetails.php';
                        }
                    }
                    /* User has not logged in yet and has not send any post data */
                    else
                    {
                        include 'html/loginNav.html';
                        if(isset($_GET['regOk']))
                        {
                            include 'html/regOk.html';
                        }
                        include 'html/loginForm.html';
                    }
                ?>
    </body>
</html>