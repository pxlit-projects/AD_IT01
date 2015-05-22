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
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed page-scroll" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="index.php">FINAH-NAH</a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="php/logout.php">Uitloggen</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php 
            require_once 'medoo.min.php';
            $database = new medoo();
            function generateRandomString($length = 32) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
         ?>
        <section class="" id="aanvragen">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p class="title">Aanvragen</p>
                        <hr class="star-primary">
                        <span class="skills">
                            <h1>Beheren</h1>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <?php
                            if(!isset($_GET['surveyid']) && !isset($_GET['updatesurvey']))
                                echo '<p>Waarschuwing: geen surveyid voorzien.</p>';
                            else
                            {
                                if(isset($_GET['updatesurvey']))
                                {
                                    $originalUser = $database->get("surveyusers", "*", ["surveyUserid" => $_GET['updatesurvey']]);
                                    $database->update("surveyusers", ["linkedUser" => $_POST['linkeduser'], "status" => 1], ["surveyUserid" => $_GET['updatesurvey']]);
                                    $database->insert("surveyusers", ["authkey" => generateRandomString(), "user" => $_POST['linkeduser'], "linkedUser" => $originalUser['user'], "status" => 1]);
                                    echo '<script language="JavaScript"> window.location.href ="adminAanvraag.php" </script>';
                                }
                                else
                                {
                                    $surveyid = $_GET['surveyid'];
                                    $survey = $database->get("surveyusers", "*", ["surveyUserid" => $surveyid]);
                                    $aanvraaguser = $database->get('users', '*', ['userid' => $survey['user']]);
                                ?>
                            <?php echo '<form class="form-horizontal" method="post" action="editAanvraag.php?updatesurvey=' . $surveyid . '" style="margin-top: 50px;">'; ?>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="linkeduser" class="col-lg-2 control-label">Gelinkte user</label>
                                        <div class="col-lg-8">
                                            <select name="linkeduser" style="margin-top: 8px;">
                                                <?php 
                                                    if($aanvraaguser['rank'] == 1)
                                                    {
                                                        $otherusers = $database->select('users', '*', ['rank' => 2]);
                                                        foreach ($otherusers as $otheruser) {
                                                            echo '<option value="' . $otheruser['userid'] . '">' . $otheruser['firstName'] . ' ' . $otheruser['lastName'] . '</option>';
                                                        }
                                                    }
                                                    else if($aanvraaguser['rank'] == 2)
                                                    {
                                                        $otherusers = $database->select('users', '*', ['rank' => 1]);
                                                        foreach ($otherusers as $otheruser) {
                                                            echo '<option value="' . $otheruser['userid'] . '">' . $otheruser['firstName'] . ' ' . $otheruser['lastName'] . '</option>';
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-8 col-md-offset-2">
                                            <button type="submit" class="btn btn-default btn-lg btn-block">Goedkeuren</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            <?php 
                                }   
                            } 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>