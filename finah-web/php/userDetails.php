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
    <?php
        include 'html/userInfo.html';
        
        if($user[0]['rank'] > 9)
        {
            include 'html/admin.html';
        }
    ?>
</div>