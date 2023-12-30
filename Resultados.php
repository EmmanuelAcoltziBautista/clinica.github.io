<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<a href="Recepcion.php">Regresar</a>
<a href="index.php">Cerrar secion</a>
<center>
<h1>Resultados</h1>
<form method="post">
<label for="CLAVE">Clave</label>
<input type="text" id="CLAVE" name="CLAVE" placeholder="Clave:" required>
<input type="submit" id="enviar" name="enviar" value="Mostrar">
<form>
<?php
include('Basedatos.php');
if(ISSET($_POST["enviar"])){
$conexionbd=conectar_bd();
$CLAVE=$_POST["CLAVE"];
$query="SELECT * FROM `ALTAS` WHERE CLAVE='".$CLAVE."';";
$RESULTADO=mysql_query($query,$conexionbd);
if($REGISTRO=mysql_fetch_assoc($RESULTADO)){

$sangre=$REGISTRO["SANGRE"];
$orina=$REGISTRO["ORINA"];
$popo=$REGISTRO["POPO"];

if($sangre=="si"){

}
if($orina=="si"){
$coneOrina=conectar_bd();
$qOrina="SELECT * FROM ORINA WHERE CLAVE='".$CLAVE."'";
$rOrina=mysql_query($qOrina,$coneOrina);
if($reOrina=mysql_fetch_assoc($rOrina)){

}
}
if($popo=="si"){

}



}
}
?>
</body>
</html>
