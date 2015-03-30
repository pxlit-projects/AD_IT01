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
        <link rel="stylesheet" type="text/css" href="css/customBootstrap.css">
		<link rel="icon" type="image/png" href="images/logo/logo.png">
    </head>
    <body>
        <?php
            require_once 'medoo.min.php';
            if(!isset($_GET['surveyuser'], $_GET['authkey']))
            {
                echo '<script type="text/javascript">alert ("De link is niet geldig.");</script>';
                echo '<script language="JavaScript"> window.location.href ="index.php" </script>';  
            }
            include 'html/enqueteNav.html';
            $database = new medoo();

            $checkAuth = $database->has(
                "surveyUsers", [
                "AND" => [
                "surveyUserid" => $_GET['surveyuser'],
                "authkey" => $_GET['authkey']
                ]]);

            if(!$checkAuth)
            {
                echo '<script type="text/javascript">alert ("Het account is niet geldig.");</script>';
                echo '<script language="JavaScript"> window.location.href ="index.php" </script>';
            }

            $user = $database->get(
                    "surveyUsers", "*", [
                    "AND" => [
                    "surveyUserid" => $_GET['surveyuser'],
                    "authkey" => $_GET['authkey']
                    ]]);

            if(!isset($_GET['vraagid']))
            {
                $lastQuestion = $database->count(
                    "antwoorden", [
                    "userid" => $user['surveyUserid']
                    ]);

                /* Loading page for the first time */
                if($lastQuestion == 0)
                {
                    $answers = $database->select("antwoorden", "*", [
                        "userid" => $user['surveyUserid']
                        ]);

                    include 'php/inleiding.php';
                }
                else
                {
                    $amountofquestions = $database->count("vragen", "*");

                    $question = $database->get("vragen", "*", [
                    "vraagid" => $lastQuestion
                    ]);

                    $theme = $database->get("thema", "*", [
                    "themaid" => $question['themaid']
                    ]);

                    echo '<div class="row" id="rowTopMargin50px">';
                        echo '<div class="col-md-offset-2 col-md-8">';
                            echo '<legend>' . $theme['themanaam'] . '</legend>';
                            echo '<p>' . $question['vraag'] . '</p>';
                            echo '<img src="' . $question['logo'] . '" alt="" class="img-responsive center-block" />';
                            ?>
                        <div id="labelDiv">
                            <input type="radio" name="radio" id="radio1" class="radio"/>
                            <label id="radioLabel" for="radio1">Verloopt naar wens</label>
                        </div>

                        <div id="labelDiv">
                            <input type="radio" name="radio" id="radio2" class="radio"/>
                            <label id="radioLabel" for="radio2">Probleem - niet hinderlijk</label>
                        </div>

                        <div id="labelDiv">   
                            <input type="radio" name="radio" id="radio3" class="radio"/>
                            <label id="radioLabel" for="radio3">Probleem - hinderlijk voor cliënt</label>
                        </div>

                        <div id="labelDiv">   
                            <input type="radio" name="radio" id="radio4" class="radio"/>
                            <label id="radioLabel" for="radio4">Probleem - hinderlijk voor mantelzorger</label>
                        </div>

                        <div id="labelDiv">   
                            <input type="radio" name="radio" id="radio5" class="radio"/>
                            <label id="radioLabel" for="radio5">Probleem - hinderlijk voor beide</label>
                        </div>
                        <?php
                        echo '</div>';
                    echo '</div>';
                }
            }
            else
            {
                $amountofquestions = $database->count("vragen", "*");

                $question = $database->get("vragen", "*", [
                    "vraagid" => $_GET['vraagid']
                    ]);

                $theme = $database->get("thema", "*", [
                    "themaid" => $question['themaid']
                    ]);

                echo '<div class="row" id="rowTopMargin50px">';
                    echo '<div class="col-md-offset-2 col-md-8">';
                        echo '<legend>' . $theme['themanaam'] . '</legend>';
                        echo '<img src="' . $question['logo'] . '" alt="" class="img-responsive center-block" />';
                        echo '<p>' . $question['vraag'] . '</p>';
                        ?>
                        <div id="labelDiv">
                            <input type="radio" name="radio" id="radio1" class="radio"/>
                            <label id="radioLabel" for="radio1">Verloopt naar wens</label>
                        </div>

                        <div id="labelDiv">
                            <input type="radio" name="radio" id="radio2" class="radio"/>
                            <label id="radioLabel" for="radio2">Probleem - niet hinderlijk</label>
                        </div>

                        <div id="labelDiv">   
                            <input type="radio" name="radio" id="radio3" class="radio"/>
                            <label id="radioLabel" for="radio3">Probleem - hinderlijk voor cliënt</label>
                        </div>

                        <div id="labelDiv">   
                            <input type="radio" name="radio" id="radio4" class="radio"/>
                            <label id="radioLabel" for="radio4">Probleem - hinderlijk voor mantelzorger</label>
                        </div>

                        <div id="labelDiv">   
                            <input type="radio" name="radio" id="radio5" class="radio"/>
                            <label id="radioLabel" for="radio5">Probleem - hinderlijk voor beide</label>
                        </div>
                <?php
                    echo '</div>';
                echo '</div>';
            }
        ?>
    </body>
</html>