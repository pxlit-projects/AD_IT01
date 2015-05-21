<?php
	function generateRandomString($length = 32) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	session_start();
	require_once '../medoo.min.php';
    $database = new medoo();

    $user = $database->get(
                        "users", "*", [
                        "AND" => [
                        "username" => $_SESSION['username'],
                        "password" => $_SESSION['password']
                        ]]);

    $database->insert("surveyusers", [
    			"authkey" => generateRandomString(),
    			"user" => $user['userid'],
    			"status" => 0,
    			]);


    echo '<script type="text/javascript">alert ("Nieuwe aanvraag gedaan.");</script>';
    echo '<script language="JavaScript"> window.location.href ="../index.php" </script>';
?>