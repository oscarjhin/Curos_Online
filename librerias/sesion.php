<?php 
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] != "OK") 
{   
	require_once('librerias/cabe.php');
	header('location: index.php');
	
}

?>