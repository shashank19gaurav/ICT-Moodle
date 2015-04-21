<?php

    // requirements
    require("constants.php");
    require("functions.php");

    // enable sessions
    session_start();
/*
    // require authentication for most pages
    if (!preg_match("{(?:login|logout|register)\.php$}", $_SERVER["PHP_SELF"]))
    {
        if (empty($_SESSION["id"]))
        {
            redirect("signin.php");
        }
    }
*/
?>
