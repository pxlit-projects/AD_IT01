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
            if(!isset($_GET['surveyuser'], $_GET['authkey']))
            {
                echo '<script type="text/javascript">alert ("De link is niet geldig.");</script>';
                echo '<script language="JavaScript"> window.location.href ="index.php" </script>';  
            }
            include 'html/enqueteNav.html';
            $database = new medoo();

            $checkAuth = $database->has(
                "surveyusers", [
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
                    "surveyusers", "*", [
                    "AND" => [
                    "surveyUserid" => $_GET['surveyuser'],
                    "authkey" => $_GET['authkey']
                    ]]);

            if(isset($_GET['beantwoord'], $_GET['radio']))
            {
            	if(!$database->has("antwoorden", ["AND" => ["vraagid" => $_GET['beantwoord'], "userid" => $_GET['surveyuser']]]))
            	{
            		if(isset($_GET['radio2']))
            		{
            			$database->insert("antwoorden", ["vraagid" => $_GET['beantwoord'], "userid" => $_GET['surveyuser'], "antwoord" => $_GET['radio'], "werk" => $_GET['radio2']]);
            		}
            		else
            		{
            			$database->insert("antwoorden", ["vraagid" => $_GET['beantwoord'], "userid" => $_GET['surveyuser'], "antwoord" => $_GET['radio'], "werk" => 0]);
            		}
            	}
            }

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
                    "vraagid" => ($lastQuestion + 1)
                    ]);

                    if($lastQuestion == $amountofquestions)
                    {
                    	echo '<div class="row" id="rowTopMargin50px">';
	                    echo '<div class="col-md-offset-2 col-md-8">';
		                	echo '<p>De vragenlijst is volledig ingevuld.</p>';
		                	echo '<form action="index.php">';
		                	echo '<div class="col-lg-2 col-md-offset-8">';
		                        echo '<button type="submit" class="btn btn-default btn-lg btn-block">Afsluiten</button>';
			                    echo '</div>';
		                    echo '</div>';
	                    echo '</div>';
                    }
                    else
                    {
	                    $theme = $database->get("thema", "*", [
	                    "themaid" => $question['themaid']
	                    ]);

	                    echo '<div class="row" id="rowTopMargin50px">';
	                        echo '<div class="col-md-offset-2 col-md-8">';
	                            echo '<legend>' . $theme['themanaam'] . '</legend>';
	                            echo '<p>' . $question['vraag'] . '</p>';
	                            echo '<img src="' . $question['logo'] . '" alt="" class="img-responsive center-block" />';
	                            ?>
	                        <div class="row">
		                            <form method="get" action="enquete.php">
			                            <?php
						                	echo '<input type="text" class="form-control" id="vraagid" name="surveyuser" value="' . $_GET['surveyuser'] . '">';
						                	echo '<input type="text" class="form-control" id="vraagid" name="authkey" value="' . $_GET['authkey'] . '">';
						                	echo '<input type="text" class="form-control" id="vraagid" name="vraagid" value="' . ($lastQuestion + 1) . '">';
						                	echo '<input type="text" class="form-control" id="vraagid" name="beantwoord" value="' . $lastQuestion . '">';
						                ?>
		                                <div class="col-md-6">
		                                    <div id="labelDiv">
		                                        <input type="radio" name="radio" id="radio1" class="radio" value="1" onclick="showNextButtonWithoutFeedback()"/>
		                                        <label id="radioLabel" for="radio1">Verloopt naar wens</label>
		                                    </div>

		                                    <div id="labelDiv">
		                                        <input type="radio" name="radio" id="radio2" class="radio" value="2" onclick="showNextButtonWithoutFeedback()"/>
		                                        <label id="radioLabel" for="radio2">Probleem - niet hinderlijk</label>
		                                    </div>

		                                    <div id="labelDiv">   
		                                        <input type="radio" name="radio" id="radio3" class="radio" value="3" onclick="showFeedbackDiv()"/>
		                                        <label id="radioLabel" for="radio3">Probleem - hinderlijk voor cliënt</label>
		                                    </div>

		                                    <div id="labelDiv">   
		                                        <input type="radio" name="radio" id="radio4" class="radio" value="4" onclick="showFeedbackDiv()"/>
		                                        <label id="radioLabel" for="radio4">Probleem - hinderlijk voor mantelzorger</label>
		                                    </div>

		                                    <div id="labelDiv">   
		                                        <input type="radio" name="radio" id="radio5" class="radio" value="5" onclick="showFeedbackDiv()"/>
		                                        <label id="radioLabel" for="radio5">Probleem - hinderlijk voor beide</label>
		                                    </div>
		                                </div>
		                                <div class="col-md-6" id="feedback">
		                                    <p>Wilt u dat we hieraan werken?</p>

		                                    <div id="labelDiv">
		                                        <input type="radio" name="radio2" id="radio6" class="radio" value="1" onclick="showNextButton()" />
		                                        <label id="radioLabel" for="radio6">Ja</label>
		                                    </div>

		                                    <div id="labelDiv">
		                                        <input type="radio" name="radio2" id="radio7" class="radio" value="0" onclick="showNextButton()" />
		                                        <label id="radioLabel" for="radio7">Neen</label>
		                                    </div>
		                                </div>
		                                <div class="col-lg-12" style="margin-top: 40px;">
		                                	<div class="progress">
											  <?php echo '<div class="progress-bar progress-bar-info" style="width:' . ($lastQuestion * 100 / $amountofquestions) . '%"></div>'; ?>
											</div>
		                                </div>
		                                <div class="col-lg-2 col-md-offset-8" id="nextButton">
		                                    <button type="submit" class="btn btn-default btn-lg btn-block">Volgende</button>
		                                </div>
		                            </form>
		                        </div>
	                        <?php
	                        echo '</div>';
	                    echo '</div>';
	                }
	            }
            }
            else
            {
                $amountofquestions = $database->count("vragen", "*");

                if($_GET['vraagid'] > $amountofquestions)
                {
                	echo '<div class="row" id="rowTopMargin50px">';
	                    echo '<div class="col-md-offset-2 col-md-8">';
		                	echo '<p>De vragenlijst is volledig ingevuld.</p>';
		                	echo '<form action="index.php">';
		                	echo '<div class="col-lg-2 col-md-offset-8">';
		                        echo '<button type="submit" class="btn btn-default btn-lg btn-block">Afsluiten</button>';
		                    echo '</div>';
	                    echo '</div>';
                    echo '</div>';
                }
                else
                {
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
	                        <div class="row">
	                            <form method="get" action="enquete.php">
		                            <?php
					                	echo '<input type="text" class="form-control" id="vraagid" name="surveyuser" value="' . $_GET['surveyuser'] . '">';
					                	echo '<input type="text" class="form-control" id="vraagid" name="authkey" value="' . $_GET['authkey'] . '">';
					                	echo '<input type="text" class="form-control" id="vraagid" name="vraagid" value="' . ($_GET['vraagid'] + 1) . '">';
					                	echo '<input type="text" class="form-control" id="vraagid" name="beantwoord" value="' . $_GET['vraagid'] . '">';
					                ?>
	                                <div class="col-md-6">
	                                    <div id="labelDiv">
	                                        <input type="radio" name="radio" id="radio1" class="radio" value="1" onclick="showNextButtonWithoutFeedback()"/>
	                                        <label id="radioLabel" for="radio1">Verloopt naar wens</label>
	                                    </div>

	                                    <div id="labelDiv">
	                                        <input type="radio" name="radio" id="radio2" class="radio" value="2" onclick="showNextButtonWithoutFeedback()"/>
	                                        <label id="radioLabel" for="radio2">Probleem - niet hinderlijk</label>
	                                    </div>

	                                    <div id="labelDiv">   
	                                        <input type="radio" name="radio" id="radio3" class="radio" value="3" onclick="showFeedbackDiv()"/>
	                                        <label id="radioLabel" for="radio3">Probleem - hinderlijk voor cliënt</label>
	                                    </div>

	                                    <div id="labelDiv">   
	                                        <input type="radio" name="radio" id="radio4" class="radio" value="4" onclick="showFeedbackDiv()"/>
	                                        <label id="radioLabel" for="radio4">Probleem - hinderlijk voor mantelzorger</label>
	                                    </div>

	                                    <div id="labelDiv">   
	                                        <input type="radio" name="radio" id="radio5" class="radio" value="5" onclick="showFeedbackDiv()"/>
	                                        <label id="radioLabel" for="radio5">Probleem - hinderlijk voor beide</label>
	                                    </div>
	                                </div>
	                                <div class="col-md-6" id="feedback">
	                                    <p>Wilt u dat we hieraan werken?</p>

	                                    <div id="labelDiv">
	                                        <input type="radio" name="radio2" id="radio6" class="radio" value="1" onclick="showNextButton()" />
	                                        <label id="radioLabel" for="radio6">Ja</label>
	                                    </div>

	                                    <div id="labelDiv">
	                                        <input type="radio" name="radio2" id="radio7" class="radio" value="0" onclick="showNextButton()" />
	                                        <label id="radioLabel" for="radio7">Neen</label>
	                                    </div>
	                                </div>
	                                <div class="col-lg-12" style="margin-top: 40px;">
	                                	<div class="progress">
										  <?php echo '<div class="progress-bar progress-bar-info" style="width:' . ($_GET['vraagid'] * 100 / $amountofquestions) . '%"></div>'; ?>
										</div>
	                                </div>
	                                <div class="col-lg-2 col-md-offset-8" id="nextButton">
	                                    <button type="submit" class="btn btn-default btn-lg btn-block">Volgende</button>
	                                </div>
	                            </form>
	                        </div>
	                <?php
	                    echo '</div>';
	                echo '</div>';
	            }
        	}
        ?>
    </body>
</html>