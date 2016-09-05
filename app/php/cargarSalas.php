<?php
//CARGAR SALAS DEL USUARIO

/* Informacion de la base de datos */
include("mysql.php");
session_start();

	$consulta="SELECT * FROM salas,usuarios WHERE email='$_SESSION['email']'";
	$result= mysqli_query($mysqli,$consulta);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count=mysqli_num_rows($result);
    for ($i=0; $i < $count; $i++) { 
    	echo "$result[$i]<br>";
    }
	$options = '';

    while($row = mysql_fetch_array($result)) {
    $options .="<option>" . $row['fuel_type'] . "</option>";
	}


	$menu="<form id='salas' name='salas' method='post' action=''>
	  <p><label>Salas:</label></p>
	    <select name='salas' id='salas'>
	      " . $options . "
	    </select>
	</form>";

	echo $menu;

?>