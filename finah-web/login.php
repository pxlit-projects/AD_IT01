<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="windows-1252">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="javascript/jquery-1.11.2.min.js"></script>
        <script src="javascript/javascript.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/opmaak.css">
		<link rel="icon" type="image/png" href="Images/logo/logo.png">
    </head>
    <body>
        <div class="container">
            <div class="row" id="headRow">
				<div class="col-md-3">
                    <img id="logo" src="images/logo/logo.png" alt="logo"/>
                </div>
				<div class="col-md-6" id="headTitle">
                    <p> FINAH-NAH TEST</p>
                </div>  
            </div>
			<div class="row">
			<br/><br/>
			</div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <?php
	            	if(isset($_POST['username'], $_POST['password']))
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
	            			include 'html/correctLogin.html';
	            		}
	            	}
	            ?>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </body>
</html>
