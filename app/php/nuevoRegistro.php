<?php 

/* Database connection information */
include("mysql.php");
/*
 * Local functions
 */
function fatal_error($sErrorMessage = '') {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    die($sErrorMessage);
}
/*
 * MySQL connection
 */
if (!$gaSql['link'] = mysql_pconnect($gaSql['server'], $gaSql['user'], $gaSql['password'])) {
    fatal_error('Could not open connection to server');
}
if (!mysql_select_db($gaSql['db'], $gaSql['link'])) {
    fatal_error('Could not select database ');
}
mysql_query('SET names utf8');


$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$contrasena = $_POST["contrasena"];
echo $nombre;

$query1 = "INSERT INTO usuarios(nombre,apellidos,email,contrasena) VALUES('". $nombre ."','". $apellidos ."','". $email ."','". $contrasena ."')" ;
$query3 = "INSERT INTO  `usuarios` (  `idusuario` ,  `nombre` ,  `apellidos` ,  `email` ,  `contrasena` ,  `foto_perfil` ,  `hash` ) 
VALUES ('". $id ."','". $nombre ."','". $apellidos ."','". $email ."','". $contrasena ."','NULL','NULL')";


$hecho1=0;
if($query_res1=mysql_query($query1)){

$hecho1=1;
$sql = "SELECT idusuario
        FROM usuarios
        where email='". $email ."'";
$res = mysql_query($sql);
while($row = mysql_fetch_array($res, MYSQL_ASSOC))
  {   
$id_nuevo=$row['idusuario'];
  }
}
$hecho2=0;
$n=0;
for ($i=0;$i<count($salas);$i++)
{
$query2 = "insert into usuarios_salas(idusuario,idsala) values(
             ". $id_nuevo . ",
            " . $salas[$i] . ")" ;
            $query_res2 = mysql_query($query2);
            $n=1; 
}
if($n==1){$hecho2=1;}

if ($hecho1==0 || $hecho2==0) {
  
    if (mysql_errno() == 1062) {
        $mensaje = "Imposible añadir el usuario, este email ya existe";
        $estado = mysql_errno();
    } else {
        $mensaje = 'Error en la cnsulta: ' . mysql_error() . "\n";
        $estado = mysql_errno();
    }
}
else
{
    $mensaje = "Insercion correcta";
    $estado = 0;
}
$resultado = array();
 $resultado[] = array(
      'mensaje' => $mensaje,
      'estado' => $estado
   );
 header("refresh:5; url=http://www.soundmov.com/salas.html");
echo json_encode($resultado);

?>