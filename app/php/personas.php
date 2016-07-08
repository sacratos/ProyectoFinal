<?php  

	if( isset($_GET['id']) ) {

		get_persons($_GET['id']);
	}else{
		die("Solicitud no valida.");
	}

	function get_persons( $id ) {

		//cambia por los detalles de tu base de datos.
		$dbserver = "localhost";
		$dbuser = "usuario_basededatos";
		$password = "pwd_basedatos";
		$dbname = "nombre_basededatos";
		
		$database = new mysqli($dbserver, $dbuser, $password, $dbname);

		if ($database->connect_errno) {
			die("No se ha podido conectar a la base de datos");
		}
	}

	
?>