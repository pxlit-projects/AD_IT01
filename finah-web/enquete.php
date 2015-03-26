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
            require_once 'medoo.min.php';
            session_start();
            if(!isset($_SESSION['username'], $_SESSION['password']))
            {
                echo '<script language="JavaScript"> window.location.href ="index.php" </script>';
            }
            include 'html/enqueteNav.html';
            $database = new medoo();
            $user = $database->select(
                    "users", "*", [
                    "AND" => [
                    "username" => $_SESSION['username'],
                    "password" => $_SESSION['password']
                    ]]);

            /* Loading page for the first time */
            if(!isset($_POST['vraagid']))
            {
                $answers = $database->select("antwoorden", "*", [
                    "userid" => $user[0]['userid']
                    ]);

                /* User has not filled in any questions yet */
                if($answers == null)
                {
                    include 'html/inleiding.html';
                }
            }
            else
            {
                $amountofquestions = $database->count("vragen", "*");

                $question = $database->select("vragen", "*", [
                    "vraagid" => $_POST['vraagid']
                    ]);

                $theme = $database->select("thema", "*", [
                    "themaid" => $question[0]['themaid']
                    ]);

                echo '<div class="row" id="rowTopMargin50px">';
                    echo '<div class="col-md-offset-2 col-md-8">';
                        echo '<legend>' . $theme[0]['themanaam'] . '</legend>';
                        echo '<p>' . $question[0]['vraag'] . '</p>';
                        echo '<img src="images/illustraties/d155.jpg" alt="" class="img-responsive center-block" />';
                    echo '</div>';
                echo '</div>';
            }
        ?>
    </body>
</html>