<?php

if(isset($_POST['oldPassword'], $_POST['newPassword'], $_POST['newPassword2']))
{
	session_start();
	require_once '../medoo.min.php';
    $database = new medoo();

    $user = $database->get(
                "users", "*", [
                "AND" => [
                "username" => $_SESSION['username'],
                "password" => $_SESSION['password']
                ]]);

    if($user['password'] == md5($_POST['oldPassword']) && $_POST['newPassword'] === $_POST['newPassword2'])
    {
    	$database->update("users",["password" => md5($_POST['newPassword'])],["username" => $_SESSION['username']]);
    	echo '<script language="JavaScript"> window.location.href ="../index.php?updatePass=true" </script>';
    }
    else
    {
    	echo '<script language="JavaScript"> window.location.href ="../index.php?updatePass=false" </script>';  
    }
}
else
{
    echo '<script language="JavaScript"> window.location.href ="../index.php?updatePass=false" </script>';  
}

?>