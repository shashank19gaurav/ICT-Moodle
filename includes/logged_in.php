<?php require_once("../includes/functions.php"); ?>

<?php

$id = $_SESSION['user_id'];

if(!isset($id))
	redirect_to("../template/homepage.php");
?>