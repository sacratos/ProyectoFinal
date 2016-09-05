<?php 

/* Descomentaríamos la siguiente línea para mostrar errores de php en el fichero: */
// ini_set('display_errors', '1');
/* Definimos los parámetros de conexión con la bbdd: */

$dbinfo = "mysql:dbname=DBProyectoFinal;host=localhost";
$user = "root";
$pass = "swesaswesa7,.";
//Nos intentamos conectar:
try {
    /* conectamos con bbdd e inicializamos conexión como UTF8 */
    $db = new PDO($dbinfo, $user, $pass);
    $db->exec('SET CHARACTER SET utf8');
} catch (Exception $e) {
    echo "La conexi&oacute;n ha fallado: " . $e->getMessage();
}
/* Para hacer debug cargaríamos a mano el parámetro, descomentaríamos la siguiente línea: */
//$_REQUEST['email'] = "pepito@hotmail.com";
if (isset($_REQUEST['email'])) {
    /* La línea siguiente la podemos descomentar para ver desde firebug-xhr si se pasa bien el parámetro desde el formulario */
    //echo $_REQUEST['email'];
    $email = $_REQUEST['email'];
    $sql = $db->prepare("SELECT * FROM usuarios WHERE email=?");
    $sql->bindParam(1, $email, PDO::PARAM_STR);
    
 
    $sql->execute();
    /* Ojo... PDOStatement::rowCount() devuelve el número de filas afectadas por la última sentencia DELETE, INSERT, o UPDATE 
     * ejecutada por el correspondiente objeto PDOStatement.Si la última sentencia SQL ejecutada por el objeto PDOStatement 
     * asociado fue una sentencia SELECT, algunas bases de datos podrían devolver el número de filas devuelto por dicha sentencia. 
     * Sin embargo, este comportamiento no está garantizado para todas las bases de datos y no debería confiarse en él para 
     * aplicaciones portables.
     */

    $valid = 'true';
    if ($sql->rowCount() > 0) {
        
        echo "ERROR, EL USUARIO EXISTE";
        $valid= 'false';
    } else {
        echo "El usuario no existe";
        $valid='true';


        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $email = $_POST["email"];
        $contrasena = $_POST["contrasena"];

        /*$datos={"id:".$id_nuevo.",nombre:".$nombre.",apellidos:". $apellidos . ",email:". $email . ",contrasena:".$contrasena};
        echo $datos;*/

        $query1 = "INSERT INTO usuarios(nombre,apellidos,email,contrasena) VALUES('". $nombre ."','". $apellidos ."','". $email ."','". $contrasena ."')" ;
        $query3 = "INSERT INTO  `usuarios` (  `idusuario` ,  `nombre` ,  `apellidos` ,  `email` ,  `contrasena` ,  `foto_perfil` ,  `hash` ) 
        VALUES ('". $id ."','". $nombre ."','". $apellidos ."','". $email ."','". $contrasena ."','NULL','NULL')";


        $hecho1=0;
        if($query_res1=mysql_query($query1)){

            $hecho1=1;
            $sql = "SELECT idusuario FROM usuarios WHERE email='". $email ."'";
            $res = mysql_query($sql);
            
            while($row = mysql_fetch_array($res, MYSQL_ASSOC)){   
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
                $mensaje = 'Error en la consulta: ' . mysql_error() . "\n";
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
        echo json_encode($resultado);
          }
}

$sql=null;
$db = null;
echo $valid;
header(location: ../salas.html)

?>