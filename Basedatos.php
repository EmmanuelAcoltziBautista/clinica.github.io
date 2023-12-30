<?php
function conectar_bd(){
$servidor="localhost";
$nombrebd="CLINICA";
$usuario="Emmanuel";
$contrasena="123";
$conexion=mysql_connect($servidor,$usuario,$contrasena);
mysql_select_db($nombrebd,$conexion);
return $conexion;
}
?>
