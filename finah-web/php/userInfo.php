<section class="" id="profiel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="title">PROFIEL</p>
                    <hr class="star-primary">
					<span class="skills">
						<h1 class="changeL" id="textProf">Profiel</h1>
					</span>
				</div>
			</div>
		<div class="container" id="ProfielData">
            <div class="row">
				
                <div class="col-lg-4 col-lg-offset-3">
					<img src="images/logo/logo.png" alt="FINAH-NAH" class="profileLogo">
				</div>
				<div class="col-lg-4 profileData">
					<label for="name">Naam:</label>
					<p><?php echo $user['firstName'] . " " . $user['lastName']?></p>
					<label for="leeftijd">Leeftijd:</label>
					<?php
						$birthday = new DateTime($user['birthday']);
						$now = new DateTime();
						$interval = $now->diff($birthday);
					?>
					<p><?php echo $interval->y ?></p>
					<label for="email">Email:</label>
					<p><?php echo $user['email'] ?></p>
				</div>
			</div>
		</div>
		<div class="container" id="WwAanpassen">
			<div class="row">
				<form class="form-horizontal" method="post" action="php/changePassword.php">
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label for="oldPassword" >Huidig wachtwoord</label>
								<input type="password" class="form-control" placeholder="Huidig wachtwoord" id="oldPassword" name="oldPassword" required data-validation-required-message="Vul hier je huidig wachtwoord in.">
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label for="newPassword" >Nieuw wachtwoord</label>
								<input type="password" class="form-control" placeholder="Nieuw wachtwoord" id="newPassword" name="newPassword" required data-validation-required-message="Vul hier je nieuw wachtwoord in.">
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label for="newPassword2">Nieuw wachtwoord bevestigen</label>
								<input type="password" class="form-control" placeholder="Nieuw wachtwoord bevestigen" name="newPassword2" id="newPassword2" required data-validation-required-message="Bevestig het nieuwe wachtwoord.">
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-lg-offset-4">
								<button type="submit" class="btn btn-default btn-lg btn-block bigButton">Wachtwoord aanpassen</button>
							</div>
						</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 " id="DProfiel">
				<a href="#profiel" class="noLink"><button type="button" class="btn btn-default btn-block bigButton">Data</button></a>
			</div>
            <div class="col-lg-6 " id="WwWijzigen">
				<a href="#profiel" class="noLink"><button type="button" class="btn btn-default btn-block bigButton" >Wachtwoord Wijzigen</button></a>
			</div>
		</div>
</section>
<section class="success" id="rapporten">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="successTitle">RAPPORTEN</p>
                    <hr class="star-light">
					<span class="skills">
						<h1 class="light">Overzicht</h1>
					</span>
				</div>
			</div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
				</div> 
			</div>
		</div>
</section>
<section class="" id="aanvraag">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 text-center">
                    <p class="title">AANVRAAG</p>
                    <hr class="star-primary">
				</div>
			</div>
			<div class="container" id="OLopende">
			<div class="row">
				<?php
					$aanvragen = $database->select("surveyusers", "*", ["AND" => [
						"user" => $user['userid'],
						"status" => 1
						]]);

					foreach ($aanvragen as $aanvraag) {
						echo '<a id="removestyle" href="enquete.php?surveyuser=' . $aanvraag['surveyUserid'] . '&authkey=' . $aanvraag['authkey'] . '"><p><center>Klik hier om te openen.</center></p></a>';
					}

				?>
			</div>
		</div>
		<div class="row">				
            <div class="col-lg-4 col-lg-offset-2" id="OAanvraag">
				<a href="#aanvraag" class="noLink"><button type="button" class="btn btn-default btn-block bigButton">Open Aanvragen</button></a>
			</div>
			<div class="col-lg-4 col-lg-offset-">
				<a href="php/nieuwaanvraag.php" class="noLink"><button type="button" class="btn btn-default btn-block bigButton">Nieuwe Aanvraag</button></a>
			</div>
		</div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
			</div>
		</div>

    </section>

	    

