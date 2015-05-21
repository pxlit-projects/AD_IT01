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
    <body>
        <?php 
            require_once 'medoo.min.php';
            $database = new medoo();

            if(isset($_GET['regFout']))
            {
                if($_GET['regFout'] == "1")
                {
                    include 'html/loginNav.html';
                    echo "Foutieve info meegegeven";
                    include 'html/registerForm.html';
                }
                else if($_GET['regFout'] == "2")
                {
                    include 'html/loginNav.html';
                    echo "De wachtwoorden komen niet overeen";
                    include 'html/registerForm.html';
                }
            }
            else
            {
                if(isset($_POST['username'], $_POST['voornaam'], $_POST['familienaam'], $_POST['email'], $_POST['password'], $_POST['password2'], $_POST['geboortedatum'], $_POST['functie']))
                {
                    if($_POST['password'] === $_POST['password2'])
                    {
                        if(!$database->has("users", [ "OR" => ["username" => $_POST['username'], "email" => $_POST['email']]]))
                        {
                            $database->insert("users", [
                                "username" => $_POST['username'],
                                "password" => md5($_POST['password']),
                                "firstName" => $_POST['voornaam'],
                                "lastName" => $_POST['familienaam'],
                                "email" => $_POST['email'],
                                "birthday" => $_POST['geboortedatum'],
                                "rank" => $_POST['functie']
                                ]);

                            echo '<script language="JavaScript"> window.location.href ="index.php?regOk=true" </script>';
                        }
                        else
                        {
                            echo '<script language="JavaScript"> window.location.href ="register.php?regFout=1" </script>';
                        }
                    }
                    else
                    {
                        echo '<script language="JavaScript"> window.location.href ="register.php?regFout=2" </script>';
                    }
                }
                else
                {
                    include 'html/loginNav.html';
                    include 'html/registerForm.html';
                }
            }
        ?>
    </body>
</html>