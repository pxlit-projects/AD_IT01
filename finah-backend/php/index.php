<?php

	require_once 'medoo.min.php';

	/* Check if Action and Apikey is set */
	if(!isset($_GET['action']))
	{
		$data = array(
			'success' => "false",
			'message' => "no action provided"
			);
		echo json_encode($data);
		break;
	}
	else if(!isset($_GET['apikey']))
	{
		$data = array(
			'success' => "false",
			'message' => "no apikey provided"
			);
		echo json_encode($data);
		break;
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
				'success' => "false",
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
					'success' => "false",
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
									'success' => "false",
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
										'success' => "false",
										'message' => "incorrect username or password provided"
									);
									echo json_encode($data);
									break;
								}

								/* Correct username and password */
								else
								{
									$data = array(
										'success' => "true",
										'message' => "login was successful"
									);
									echo json_encode($data);
									break;
								}
							}
						break;
				}
			}
		}
	}

?>