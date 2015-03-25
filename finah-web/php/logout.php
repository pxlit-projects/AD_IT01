<?php
	session_start();
	session_destroy();
	echo '<script language="JavaScript"> window.location.href ="../index.php" </script>';
?>