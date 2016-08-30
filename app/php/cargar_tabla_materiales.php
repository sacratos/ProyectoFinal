<?php
 /* See http://datatables.net/usage/server-side for full details on the server-*/
header('Access-Control-Allow-Origin: *');
include_once 'php/mysql.php';
include_once 'php/functions.php';
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

$idusuario=$_REQUEST['idusuario'];
echo $idusuario;
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 $sql1='SELECT idmaterial,nombre_material,porcentaje_absorcion,superficie FROM materiales,usuarios,salas'; // WHERE usuarios.idusuario = '$idusuario'';


// DB table to use
$table = 'materiales';
 
// Table's primary key
$primaryKey = 'idmaterial';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'idmaterial', 'dt' => 'idMaterial' ),
    array( 'db' => 'nombrematerial',  'dt' => 'nombrematerial' ),
    array( 'db' => 'porcentaje_absorcion',   'dt' => 'porcentaje_absorcion' ),
    array( 'db' => 'superficie',     'dt' => 'superficie' )
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => 'swesaswesa7,.',
    'db'   => 'DBProyectoFinal',
    'host' => 'localhost'
);
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);