<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php

	session_destroy();
	redirect_to("../template/homepage.php");
	
?>
