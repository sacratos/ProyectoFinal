<?php 

/* Descomentaríamos la siguiente línea para mostrar errores de php en el fichero: */
// ini_set('display_errors', '1');
/* Definimos los parámetros de conexión con la bbdd: 
include_once 'mysql.php';
include_once 'functions.php';
*/
//header('Location: ../salas.html');
include ("mysql.php");
session_start();

$dbinfo = "mysql:dbname=DBProyectoFinal;host=localhost";
$user = "root";
$pass = "swesaswesa7,.";
//Nos intentamos conectar:



try {
    
    $db = new PDO($dbinfo, $user, $pass);
    $db->exec('SET CHARACTER SET utf8');
} catch (Exception $e) {
    echo "La conexi&oacute;n ha fallado: " . $e->getMessage();
}


/* Para hacer debug cargaríamos a mano el parámetro, descomentaríamos la siguiente línea: */
//$_REQUEST['email'] = "pepito@hotmail.com";
if (isset($_REQUEST['emailEntrar'])) {
    /* La línea siguiente la podemos descomentar para ver desde firebug-xhr si se pasa bien el parámetro desde el formulario */
    //echo $_REQUEST['email'];
   /* $email = $_REQUEST['emailEntrar'];
    $sql = $db->prepare("SELECT * FROM usuarios WHERE email=?");
    $sql->bindParam(1, $email, PDO::PARAM_STR);
    
 
    $sql->execute();
    /* Ojo... PDOStatement::rowCount() devuelve el número de filas afectadas por la última sentencia DELETE, INSERT, o UPDATE 
     * ejecutada por el correspondiente objeto PDOStatement.Si la última sentencia SQL ejecutada por el objeto PDOStatement 
     * asociado fue una sentencia SELECT, algunas bases de datos podrían devolver el número de filas devuelto por dicha sentencia. 
     * Sin embargo, este comportamiento no está garantizado para todas las bases de datos y no debería confiarse en él para 
     * aplicaciones portables.
     */

   /* $valid = 'true';
    if ($sql->rowCount() > 0) {

        //echo "El usuario ya existe";
        $valid= 'false';
        $contrasena= $_REQUEST['contrasenaEntrar'];
        



        /*
        header ('Location: ../salas.html');*/
   /* } else {
        echo "El usuario no existe";
       $valid='true';
    }*/
    $email=$_REQUEST['emailEntrar'];
    $password=$_REQUEST['contrasenaEntrar'];
    
    $sql = "SELECT idusuario FROM usuarios WHERE email='$email' AND contrasena='$password'";
    $result= mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count=mysqli_num_rows($result);

    //si existen usuario y contraseña, Count = 1;

    if ($count==1) {
        //ESTO ES QUE EL USUARIO Y LA CONTRASEÑA SON CORRECTOS.
        
        $_SESSION['email'] = $email;
        echo "2";
        header("location: ../salas2.html");
    } else {
        echo "MAL Hecho";
    }
    

}
$sql=null;
$db = null;
//echo $valid;
?>