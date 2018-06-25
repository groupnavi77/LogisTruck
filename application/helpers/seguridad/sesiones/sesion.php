<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";
	session_start();

  if(!$_SESSION["autentic"]){
		header("Location: " . $INDEX_HOST);
		session_destroy();

  }


 ?>
