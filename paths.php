<?php

// RUTAS DESDE DISCO C PARA LA PROGRAMACION PHP

	// EL INDEX DEL PROYECTO
	$INDEX_DIR = $_SERVER["DOCUMENT_ROOT"] . "index.php";

	// TODAS LAS RUTAS DE LA CARPETA SEGURIDAD DENTRO DE HELPERS
	$SEGURIDAD_DIR = $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/seguridad/";
	$SESION_DIR = $SEGURIDAD_DIR . "sesiones/";
	$SESION_IN_DIR = $SESION_DIR . "sesion.php";
	$SESION_OUT_DIR = $SESION_DIR . "sesionOut.php";
	$SESION_ADMIN = $SESION_DIR . "sesionAdmin.php";
	$SESION_CHOFER = $SESION_DIR . "sesionChofer.php";
	$SESION_SUPER = $SESION_DIR . "sesionSuper.php";
	$SESION_MECANICO = $SESION_DIR . "sesionMecanico.php";

	// TODAS LAS RUTAS DE LA CARPETA CLASE DENTRO DE HELPERS
	$CLASES_DIR = $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/clases/";
	$BITACORA_CHOFER_DIR = $CLASES_DIR . "bitacorachoferviaje.php";
	$BITACORA_VIAJE_DIR  = $CLASES_DIR . "bitacoraviaje.php";
	$CONEXION_DIR  = $CLASES_DIR . "conexion.php";
	$EMPLEADO_DIR  = $CLASES_DIR . "empleado.php";
	$VIAJE_DIR = $CLASES_DIR . "viaje.php";
	$ESTADO_VIAJE_DIR  = $CLASES_DIR . "estadoviaje.php";
	$QR_GENERADOR_DIR = $CLASES_DIR . "generador_qr.php";

	//TODAS LAS RUTAS DE LA CARPETA INC DENTRO DE HELPERS
	$INC_DIR = $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/inc/";
	$FOOTER_DIR = $INC_DIR . "footer.php";
	$HEADER_DIR = $INC_DIR . "header.php";
	$NAVBAR_DIR = $INC_DIR . "navBar.php";
	$NAVBAR1_DIR = $INC_DIR . "navbar1.php";
	$PANEL_LATERAL_PERFIL_DIR = $INC_DIR . "panelLateralPerfil.php";

	//RUTAS DE LA CARPETA CONFIG DENTRO DE HELPERS
	$CON_DIR = $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/config/";

	//RUTAS DE LA CARPETA GERAR_PDF DENTRO DE HELPERS
	$GENERAR_PDF_DIR = $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/generar_pdf/";
/*	$GENERAR_PDF_DIR = $GENERAR_PDF_DIR . "generarPdf.php";  ACA NACHO LE ARREGLA EL NOMBRE */
	$GENERAR_PDF_QR_DIR = $GENERAR_PDF_DIR . "generarPdfQR.php";



	$CONFIG_DIR = $CON_DIR . "config.php";

	// TODAS LAS RUTAS DE LA CARPETA PHPQRCODE DENTRO DE HELPERS
	$QR_DIR = $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/phpqrcode/";
	$QR_LIB_DIR = $QR_DIR . "qrlib.php";
	$QR_IMG_DIR = $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/qrImage/";

	//TODAS LAS RUTAS DE LA CARPETA UBICACION DE HELPERS
	$UBICACION_DIR =  $_SERVER["DOCUMENT_ROOT"]. "/application/helpers/ubicacion/ubicacion.php";

	//TODAS LAS RUTAS DE LA CARPETA ABM DE CONTROLADORES
	$ADD_UBICACION_DIR = $_SERVER["DOCUMENT_ROOT"]. "/application/controladores/abm/addUbicacion.php";

	//RUTAS DESDE EL LOCALHOST PARA LOS HREF O FORMULARIOS O LOS HEADER
	// EL INDEX DEL PROYECTO
	$INDEX_HOST = "http://localhost/application/vistas/index.php";

	// TODAS LAS RUTAS DE LAS SESIONES DENTRO DE SEGURIDAD DENTRO DE HELPERS
	$SESION_OUT_HOST = "http://localhost/application/helpers/seguridad/sesiones/sesionOut.php";
	$SESION_IN_HOST = "http://localhost/application/helpers/seguridad/sesiones/sesion.php";
	$VALIDAR_LOGIN_HOST = "http://localhost/application/helpers/seguridad/validarLogin.php";

	//RUTAS DE UBICACION EN LA CARPETA HELPERS
	$UBICACION_HOST = "http://localhost/application/helpers/ubicacion/ubicacion.php";

	//RUTAS DE LAS VISTAS HOSTS DE LOS DISTINTOS PANELES
	$PANEL_ADMIN_HOST = "http://localhost/application/vistas/panelControlAdmin.php";
	$PANEL_MECANICO_HOST = "http://localhost/application/vistas/panelControlMecanico.php";
	$PANEL_CHOFER_HOST = "http://localhost/application/vistas/panelControlChofer.php";
	$PANEL_SUPERVISOR_HOST = "http://localhost/application/vistas/panelControlSupervisor.php";

	// TODAS LAS RUTAS DE LA CARPETA SEGURIDAD DENTRO DE HELPERS
	$QR_GENERADOR_HOST = "http://localhost/application/helpers/clases/generador_qr.php";
	$QR_SESION_HOST = 	 "http://localhost/application/vistas/sesionQr.php";


	//TODAS LAS RUTAS PARA EJECUTAR ABMs DE LA CARPETA ABM DENTRO DE CONTROLADORES
	$ABM_EMPLEADO_ADD_HOST = "http://localhost/application/controladores/abm/abmEmpleadoAdd.php";
	$ABM_EMPLEADO_MOD_HOST = "http://localhost/application/controladores/abm/abmEmpleadoMod.php";
	$ABM_EMPLEADO_DEL_HOST = "http://localhost/application/controladores/abm/abmEmpleadoDel.php";
	$ABM_VEHICULO_ADD_HOST = "http://localhost/application/controladores/abm/abmVehiculoAdd.php";
	$ABM_VEHICULO_DEL_BAJ_HOST = "http://localhost/application/controladores/abm/abmVehiculoDelBaj.php";
	$ABM_VIAJES_ADD_HOST = "http://localhost/application/controladores/abm/abmViajesAdd.php";
	$ABM_VIAJES_DEL_HOST = "http://localhost/application/controladores/abm/abmViajesDel.php";
	$ABM_VIAJES_MOD_HOST = "http://localhost/application/controladores/abm/abmViajesMod.php";
	$ADD_UBICACION_HOST = "http://localhost/application/controladores/abm/addUbicacion.php";
	$ABM_SETTINGS_MOD_HOST = "http://localhost/application/controladores/abm/abmPassMod.php";

	// RUTAS DE LOS ARCHIVOS PARA GENERAR PDFs
	$GENERAR_PDF_EMPLEADOS_HOST = "http://localhost/application/helpers/generar_pdf/generarPdfEmpleados.php";
	$GENERAR_PDF_VEHICULOS_HOST = "http://localhost/application/helpers/generar_pdf/generarPdfVehiculos.php";
	$GENERAR_PDF_VIAJES_HOST = "http://localhost/application/helpers/generar_pdf/generarPdfViajes.php";
	$GENERAR_PDF_QR_HOST = "http://localhost/application/helpers/generar_pdf/generarPdfQR.php";

	// RUTAS DE LOS ARCHIVOS PARA REPORTAR INCIDENTES
	$REPORTAR_DESVIO_HOST = "http://localhost/application/controladores/reportes/reportarDesvio.php";
	$REPORTAR_CARGADECOMBUSTIBLE_HOST = "http://localhost/application/controladores/reportes/reportarCargaDeCombustible.php";
	$REPORTAR_KILOMETRAJE_HOST = "http://localhost/application/controladores/reportes/reportarKilometraje.php";

	$INICIAR_VIAJE_HOST = "http://localhost/application/controladores/reportes/iniciarViajeAsignado.php";
	$FINALIZAR_VIAJE_HOST = "http://localhost/application/controladores/reportes/finalizarViajeAsignado.php";

	$REPORTAR_MANTENIMIENTO_MECANICO_HOST = "http://localhost/application/controladores/reportes/reportarMantenimiento.php";
	$VEHICULO_FINALIZAR_MANTENIMIENTO_HOST = "http://localhost/application/controladores/reportes/finalizarMantenimiento.php";

		$REPORTAR_MANTENIMIENTO_HOST = "http://localhost/application/vistas/reportesDeMantenimiento.php";
?>
