<?php 
session_start();
include_once("function/helper.php");

session_unset($_SESSION['logged_in']);
header("location: ".base_url."/login.php");
 ?>