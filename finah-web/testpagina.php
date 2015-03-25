<!DOCTYPE html>
<html>
    <head>
        <title>Enquête</title>
        <meta charset="windows-1252">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="javascript/jquery-1.11.2.min.js"></script>
        <script src="javascript/javascript.js"></script>
        <link rel="stylesheet" type="text/css" href="css/opmaakTest.css">
		<link rel="icon" type="image/png" href="Images/logo/logo.png">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">FINAH-NAH</a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                <?php
                    session_start();
                    /* Check if user is previously logged in */
                    if(isset($_SESSION['username'], $_SESSION['password']))
                    {
                        include 'html/logoutForm.html';
                    }
                    /* User is not logged in yet */
                    /* Check if any post data is send */
                    else if(isset($_POST['username'], $_POST['password']))
                    {
                        require_once 'medoo.min.php';
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
                            include 'html/failedLogin.html';
                            include 'html/loginForm.html';
                        }
                        else
                        {
                            $_SESSION['username'] = $username;
                            $_SESSION['password'] = $password;
                            include 'html/correctLogin.html';
                            include 'html/logoutForm.html';
                        }
                    }
                    /* User has not logged in yet and has not send any post data */
                    else
                    {
                        include 'html/loginForm.html';
                    }
                ?>
                </div>
            </div>
        </div>
    </body>
</html>