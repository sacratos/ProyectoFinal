<?php
//Iniciamos Sesion
session_start();
	//Comprobamos si el formulario reamente esta trabajando via POST
	if(isset($_POST["Enviar"]))	{

	/*var_dump($_POST);//muestra en pantalla los datos que se estan enviando (solo para debugging)*/
	//Recogemos las variables desde el formulario
	$nombre= $_POST["nombre"];
	$email= $_POST["email"];
	$comentario= $_POST["comentario"];
	$captcha=sha1($_POST["captcha"]);
/*	$cookie_captcha= $_COOKIE["cookie"];*/

		//Validacion de Campos (no vacios y campos correctos)
		if(empty($_POST["nombre"])){
			echo "debe ingresar nombre";
		}else if (empty($_POST["email"])){
			echo "Email vacio";
		}else if (empty($_POST["comentario"])){
			echo "comentario vacio";
		}else if (empty($_POST["captcha"])){
			echo "captcha vacio";
		}else if ($_SESSION["codigo_seguridad"] != $_POST["captcha"]){ //Comparamos si el codigo ingresado en el campo captcha es diferente al de la sesion
			echo "EL CAPTCHA NO ES VALIDOOOO"; //no hay coincidencia
		}else{
			//ACCIONES A SEGUIR SI SE PASA LAS VALIDACIONES
		echo "PASO LA VALIDACION ";
		/*enviaEmail();*/
		
					
	}
	
	}//if validaciones
	
	function enviaEmail(){
	//Recogemos las Variables
	$nombre= $_POST['nombre'];
	$email= $_POST['email'];
	$comentario= $_POST['comentario'];
	
	//Definimos Email de Destino
	$destinatario= "algo@algo.com";
	
	//Cabeceras para Evitar que el Correo sea Considerado Spam
	$headers = "From: $nombre <$email>\r\n";
	$headers .= "X-Mailer: PHP5\n";
	$headers .= 'MIME-Version: 1.0'; 
	$header .= 'Content-type: text/html; charset=iso-8859-1';
	
	//Preparacion del Email
	$asunto= "Consulta desde la pagina";
	$cuerpo="Nombre:".$nombre."</br>";
	$cuerpo .="Correo Electronico:".$email."</br>";
	$cuerpo .="Comentario o Consulta:".$comentario."</br>";
	
	//Validacion de Campos Vacios Antes de Enviar
	
	//Envio del Mensaje
	if($nombre != '' &&$email != '' &&$comentario != '' ){
		//si pasa la validacion de que no falte ningun campo, envia el email
		mail($destinatario,$asunto,$cuerpo,$headers);
	}else
	{
		echo "<script>alert 'fallo, faltan campos' </script>";	
	}
	
}//Fin Funcion enviaEmail
	
	
	
?>