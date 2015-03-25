        <div class="col-md-offset-2 col-md-8">
            <legend>Welkom</legend>
            <?php
                $database = new medoo();
                $user = $database->select(
                    "users", "*", [
                    "AND" => [
                    "username" => $_SESSION['username'],
                    "password" => $_SESSION['password']
                    ]]);
                echo '<p>Welkom ' . $user[0]['firstName'] . " " . $user[0]['lastName'] . ".</p>";
            ?>
            <p>FINAH is een digitaal meetinstrument waarmee het functioneren van personen met NAH op vlak van activiteiten en participatie op efficiënte wijze in kaart kan worden gebracht. Dit gebeurt door de ervaren hinder te bevragen bij zowel de persoon met NAH en zijn/haar mantelzorger.</p>
            <p>Op basis van de antwoorden wordt een overzichtsrapport gegenereerd. Deze werkwijze zorgt ervoor dat op tijdsefficiënte wijze een globaal beeld wordt gevormd, op basis waarvan de hulpverlener het gesprek kan aangaan en een adequaat behandelplan kan opstellen.</p>
        </div>
    </div>
    <div class="row" id="rowTopMargin50px">
        <div class="col-md-offset-2 col-md-8">
            <legend>Beschikbare enquêtes</legend>
            <?php
                $enquetes = $database->select(
                    "enqueteperuser", "*", [
                    "AND" => [
                    "ingevuld" => "0",
                    "userid" => $user[0]['userid']
                    ]]);
                foreach ($enquetes as $enquete) {
                    $enqueteDetails = $database->select(
                        "enquete", "*", [
                        "enqueteid" => $enquete['enqueteid'
                        ]]);
                    $datum = date_create($enqueteDetails[0]['aanmaakDatum']);
                    echo '<a href="enquete.php?id=' . $enquete['enqueteid'] . '">' . $enqueteDetails[0]['naam'] . ' (aangemaakt op: ' . date_format($datum, 'd-m-Y') . ')</a>';
                }
            ?>
        </div>
    </div>
    <div class="row" id="rowTopMargin50px">
        <div class="col-md-offset-2 col-md-8">
            <legend>Wachtwoord aanpassen</legend>
            <form class="form-horizontal" method="post" action="changePassword.php">
                <fieldset>
                    <div class="form-group">
                        <label for="oldPassword" class="col-lg-3 control-label">Huidig wachtwoord</label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" id="oldPassword" placeholder="Huidig wachtwoord" name="oldPassword" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="newPassword" class="col-lg-3 control-label">Nieuw wachtwoord</label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" id="newPassword" placeholder="Nieuw wachtwoord" name="newPassword" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="newPassword2" class="col-lg-3 control-label">Huidig wachtwoord</label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control" id="newPassword2" placeholder="Nieuw wachtwoord" name="newPassword2" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8 col-md-offset-2">
                            <button type="submit" class="btn btn-default btn-lg btn-block">Wachtwoord aanpassen</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <?php
        if($user[0]['rank'] > 9)
        {
            include 'html/admin.html';
        }
    ?>
</div>