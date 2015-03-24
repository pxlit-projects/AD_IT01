<!DOCTYPE html>
<html>
    <head>
        <title>LoginTest</title>
        <meta charset="windows-1252">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="javascript/jquery-1.11.2.min.js"></script>
        <script src="javascript/javascript.js"></script>
        <script src="javascript/general.js"></script>
    </head>
    <body onload="start()")>
        <div class="container-fluid">
            <p> FINAH-NAH LOGINTEST</p>
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                <?php
                	session_start();
                	/* Check if user is previously logged in */
                	if(isset($_SESSION['username'], $_SESSION['password']))
                	{
                		include 'logoutForm.html';
                                echo "<script>alert('U bent al ingelogd!');</script>";
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
	            			include 'failedLogin.html';
	            		}
	            		else
	            		{
	            			$_SESSION['username'] = $username;
	            			$_SESSION['password'] = $password;
	            			include 'correctLogin.html';
	            		}
	            	}
	            	/* User has not logged in yet and has not send any post data */
	            	else
	            	{
	            		include 'loginForm.html';
	            	}
	            ?>
                </div>
            </div>
        </div>
    </body>
</html>
