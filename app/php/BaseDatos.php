<?php
/**
* 
*/
class BaseDatos {
	
	private $pass;
    private $nom;
    private $dns;
    private $con;
    
    //Creamos los metodos:
    //Metodo __construct:
    public function __construct($dns="mysql:host=localhost;dbname=usuarios",$nom="root",$pass="swesaswesa7,.") {
        
        $this->pass=$pass;
        $this->nom=$nom;
        $this->dns=$dns;
        //self::conectar();
        
    }
    
    public function conectar(){
        $this->con=new PDO($this->dns,$this->nom,$this->pass);
        
        if ($this->con)
            echo "<h5>conexión realizada satisfactoriamente</h5>";
        else
            echo "<h5>ohhhh!!!! no se ha conectado</h5>";
 
       return $this->con;
    }

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

	public function borrar($consulta=null,$parametro=null){
    $miConexion=  $this->conectar();
        $consulta1="SELECT idsala, nombresala, descripcion, imagensala FROM usuarios, salas, usuarios_salas WHERE nombresala=:nom";
        $var=[":nom"=>"$parametro"];
            $resultado=$miConexion->prepare($consulta1);
            
            $resultado->execute($var);
        $filas=$resultado->rowCount();
        
       
        
        if ($filas==0){
            echo "<i>No se ha borrado la sala $parametro</i></br>"
                    ."<i>No existe la sala</i>";
            
        }  elseif ($filas==1) {
            $miConexion=  $this->conectar();
            $var=[":nombre"=>"$parametro"];
            $resultado=$miConexion->prepare($consulta);
            
            $resultado->execute($var);
            $filas=$resultado->rowCount();
            echo "<h4>Se ha borrado correctamente el usuario $parametro</h4>";
        }
        //cerramos la conexion
        $consulta->closeCursor();
        $miConexion->close();
    }
}

?>