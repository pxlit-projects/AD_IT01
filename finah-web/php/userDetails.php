        
	<header>
        <div class="container" id="welcome">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">Welkom</span>
                        <hr class="star-light">
                        <span class="skills">
						<?php
								$database = new medoo();
								$user = $database->get(
									"users", "*", [
									"AND" => [
									"username" => $_SESSION['username'],
									"password" => $_SESSION['password']
									]]);
								echo '<p>' . $user['firstName'] . " " . $user['lastName'] . ".</p>";
							?>
						</span>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-lg-12">
					<p>FINAH is een digitaal meetinstrument waarmee het functioneren van personen met NAH op vlak van activiteiten en participatie op efficiënte wijze in kaart kan worden gebracht. Dit gebeurt door de ervaren hinder te bevragen bij zowel de persoon met NAH en zijn/haar mantelzorger.</p>
					<p>Op basis van de antwoorden wordt een overzichtsrapport gegenereerd. Deze werkwijze zorgt ervoor dat op tijdsefficiënte wijze een globaal beeld wordt gevormd, op basis waarvan de hulpverlener het gesprek kan aangaan en een adequaat behandelplan kan opstellen.</p>
                </div>
            </div>
        </div>
    </header>
    <?php
		include 'php/userInfo.php';
        if($user['rank'] > 9)
        {
            include 'html/admin.html';
        }
		include 'html/footer.html';
        
    ?>
