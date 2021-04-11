<?php
require_once("models/load_information.php");
session_start();
session_destroy();
session_unset();
header('location: '.$web['url'].'/home.html');
?>