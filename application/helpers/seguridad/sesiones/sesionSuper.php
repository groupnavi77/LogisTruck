<?php
require_once $_SERVER["DOCUMENT_ROOT"]. "/paths.php";

  if($_SESSION["rol"] != 'sysadmin'){
    if($_SESSION["rol"] != 'supervisor'){
      switch ($_SESSION["rol"]) {
        case 'administrador':
    			header("Location: " . $PANEL_ADMIN_HOST);
    			break;

    		case 'mecanico':
    			header("Location: " . $PANEL_MECANICO_HOST);
    			break;

    		case 'chofer':
    			header("Location: " . $PANEL_CHOFER_HOST);
    			break;

    		case 'supervisor':
    			header("Location: " . $PANEL_SUPERVISOR_HOST);
    			break;

    		case 'sysadmin':
    			header("Location: " . $PANEL_ADMIN_HOST);
    			break;

    		default:
    		header("Location: " . $INDEX_HOST);
    		session_destroy();
    		exit();
    			break;
    	}
    }
  }

 ?>
