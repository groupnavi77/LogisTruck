<?php
	require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
	session_start();
	session_destroy();
	header("Location: " . $INDEX_HOST);

	//require_once($_SERVER['DOCUMENT_ROOT'] . '../vistas/index.php');
	//header("location:index.php");
 ?>
