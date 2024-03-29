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
        ?>
        <section class="" id="aanvragen">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p class="title">Aanvragen</p>
                        <hr class="star-primary">
                        <span class="skills">
                            <h1>Overzicht</h1>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <?php
                        
                            $openaanvragen = $database->select("surveyusers", "*", ["status" => 0]);
                            ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Naam</th>
                                    <th>Functie</th>
                                    <th>Email</th>
                                    <th>Actie</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $counter = 1;
                            foreach ($openaanvragen as $openaanvraag) {
                                $user = $database->get("users", "*", ["userid" => $openaanvraag['user']]);

                                echo '<tr>';
                                    echo '<th>' . $counter . '</th>';
                                    echo '<th>' . $user['firstName'] . ' ' . $user['lastName'] . '</th>';
                                    if($user['rank'] == 1)
                                        echo '<th>Patiënt</th>';
                                    else if($user['rank'] == 2)
                                        echo '<th>Mantelzorger</th>';
                                    else if($user['rank'] == 10)
                                        echo '<th>Admin</th>';
                                    else
                                        echo '<th>Unknown</th>';
                                    echo '<th>' . $user['email'] . '</th>';
                                    echo '<th><a href="editAanvraag.php?surveyid=' . $openaanvraag['surveyUserid'] . '">Beheren</a></th>';
                                echo '</tr>';

                                $counter++;
                            }
                        ?>
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </section>
    </body>
</html>