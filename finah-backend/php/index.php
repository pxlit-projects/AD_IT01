<?php

	require_once 'medoo.min.php';

	/* Check if Action and Apikey is set */
	if(!isset($_GET['action']))
	{
		$data = array(
			'success' => false,
			'message' => "no action provided"
			);
		echo json_encode($data);
	}
	else if(!isset($_GET['apikey']))
	{
		$data = array(
			'success' => false,
			'message' => "no apikey provided"
			);
		echo json_encode($data);
	}

	/* Action and Apikey is set */
	else
	{
		$action = $_GET['action'];
		$apikey = $_GET['apikey'];

		/* Create database connection */
		$database = new medoo();

		/* Get data from database */
		$dbactions = $database->select("action", "*");
		$dbapikey = $database->select("apikey", "*");

		/* Check if correct Apikey is set */
		if($dbapikey[0]["key"] !== $apikey)
		{
			$data = array(
				'success' => false,
				'message' => "incorrect apikey provided"
			);
			echo json_encode($data);
			break;
		}

		/* Correct Apikey is set */
		else
		{
			$correctAction = false;

			/* Check if correct Action is set */
			foreach ($dbactions as $dbaction) {
				if($dbaction["name"] == $action)
				{
					$correctAction = true;
				}
			}

			/* Incorrect action is set */
			if(!$correctAction)
			{
				$data = array(
					'success' => false,
					'message' => "incorrect action provided"
				);
				echo json_encode($data);
			}

			/* Correct action is set */
			else
			{
				/* Deal with different actions */
				switch ($action) {

					case 'login':

							$jsondata = json_decode(file_get_contents('php://input'), true);
							/* Check if username and password is set */
							if(!isset($jsondata['username']) || !isset($jsondata['password']))
							{
								$data = array(
									'success' => false,
									'message' => "no username or password provided"
								);
								echo json_encode($data);
								break;
							} 

							/* Username and password is set */
							else
							{
								$username = $jsondata['username'];
								$password = $jsondata['password'];

								/* Check for correct username and password */
								$dblogin = $database->count("users", [
									"AND" => [
									"username" => $username,
									"password" => $password
									]]);

								/* Incorrect username and / or password */
								if($dblogin == 0)
								{
									$data = array(
										'success' => false,
										'message' => "incorrect username or password provided"
									);
									echo json_encode($data);
									break;
								}

								/* Correct username and password */
								else
								{
									$data = array(
										'success' => true,
										'message' => "login was successful"
									);
									echo json_encode($data);
									break;
								}
							}
						break;


					case 'vraag':
							$jsondata = json_decode(file_get_contents('php://input'), true);
							/* Check if vraagid is set */
							if(!isset($jsondata['vraagid']))
							{
								$data = array(
									'success' => false,
									'message' => "no vraagid set"
								);
								echo json_encode($data);
								break;
							}
							/* Vraagid is set */
							else
							{
								/* Check if vraagid exists */
								if($database->has("vragen", ["vraagid" => $jsondata['vraagid']]))
								{
									$dbvraag = $database->get("vragen", "*", ["vraagid" => $jsondata['vraagid']]);

									$dbthema = $database->get("thema", "*", ["themaid" => $dbvraag['themaid']]);

									$data = array(
										'success' => true,
										'message' => "getting vraag was successful",
										'vraagid' => $dbvraag['vraagid'],
										'vraag' => $dbvraag['vraag'],
										'logo' => $dbvraag['logo'],
										'themaid' => $dbvraag['themaid'],
										'thema' => $dbthema['themanaam']
									);

									echo json_encode($data);
									break;
								}
								/* Vraagid used does not exist */
								{
									$data = array(
										'success' => false,
										'message' => "incorrect vraagid set"
									);
									echo json_encode($data);
									break;
								}
							}
						break;


					case 'antwoord':
						$jsondata = json_decode(file_get_contents('php://input'), true);

						/* Check if vraagid is set */
						if(!isset($jsondata['vraagid']))
						{
							$data = array(
								'success' => false,
								'message' => "no vraagid set"
							);
							echo json_encode($data);
							break;
						}
						/* Check if userid is set */
						else if(!isset($jsondata['userid']))
						{
							$data = array(
								'success' => false,
								'message' => "no userid set"
							);
							echo json_encode($data);
							break;
						}
						/* Check if antwoord is set */
						else if(!isset($jsondata['antwoord']))
						{
							$data = array(
								'success' => false,
								'message' => "no antwoord set"
							);
							echo json_encode($data);
							break;
						}
						/* Everything needed is set */
						else
						{
							/* Check if vraagid exists */
							if(!$database->has("vragen", ["vraagid" => $jsondata['vraagid']]))
							{
								$data = array(
									'success' => false,
									'message' => "incorrect vraagid provided"
								);
								echo json_encode($data);
								break;
							}
							/* Check if userid exists */
							else if(!$database->has("users", ["userid" => $jsondata['userid']]))
							{
								$data = array(
									'success' => false,
									'message' => "incorrect userid provided"
								);
								echo json_encode($data);
								break;
							}
							/* Vraagid & userid exist */
							else
							{
								/* Werk is not set */
								if(!isset($jsondata['werk']))
								{
									$insertAntwoord = $database->insert("antwoorden", [
										"vraagid" => $jsondata['vraagid'],
										"userid" => $jsondata['userid'],
										"antwoord" => $jsondata['antwoord']
									]);

									/* Inserting data worked */
									if($insertAntwoord)
									{
										$data = array(
											'success' => true,
											'message' => "saved antwoord"
										);
									}
									/* Failed to insert data */
									else
									{
										$data = array(
											'success' => false,
											'message' => "failed to insert data"
										);
									}

									echo json_encode($data);
									break;
								}
								/* Werk is set */
								else
								{
									$insertAntwoord = $database->insert("antwoorden", [
										"vraagid" => $jsondata['vraagid'],
										"userid" => $jsondata['userid'],
										"antwoord" => $jsondata['antwoord'],
										"werk" => $jsondata['werk']
									]);

									/* Inserting data worked */
									if($insertAntwoord)
									{
										$data = array(
											'success' => true,
											'message' => "saved antwoord"
										);
									}
									/* Failed to insert data */
									else
									{
										$data = array(
											'success' => false,
											'message' => "failed to insert data"
										);
									}

									echo json_encode($data);
									break;
								}
							}
						}
					break;
				}
			}
		}
	}

?>