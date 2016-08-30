<?php
//CARGAR SALAS DEL USUARIO

/* Informacion de la base de datos */
include_once("mysql.php");
$r=new CargarTablas();

public function CargarTablas($consulta) {
	$miConexion=  $this->conectar();
        
        //Aqui paso todas las filas encontradas
        $filas=$miConexion->query($consulta);
        echo "<h2>Nombres de usuario:</h2>";
        while ($fila=$filas->fetch()){
            echo " $fila[0]<br/>";
        }
        $filas->closeCursor();
             
        $miConexion->close();
}







?>