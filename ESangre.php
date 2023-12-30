<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="estilos.css">
<style type="text/css">
.BoxSalida{
background:rgb(255,255,255);
border:3px solid rgb(0,0,0);
font-size:14px;
font-family:Arial;
font-weight:normal;
width:50%;
}
.AlineacionD{
text-align:right;
margin:2px;
paddin:2px;
}
.AlineacionI{
text-align:left;
margin:2px;
padding:2px;
}



</style>
<script src="Imprimir.js">
</script>

</head>
<body>
<a href="Recepcion.php">Regresar</a>
<a href="index.php">Cerrar sesión</a>
<center>
<h1>Resultados ES</h1>
<form method="post">
<label for="CLAVE">Clave</label>
<input type="text" id="CLAVE" name="CLAVE" placeholder="Clave:">
<input type="submit" id="enviar" name="enviar" value="Mostrar" class="boton">
</form>
<?php
$SALIDAout="";
$CLAVE="";
include('Basedatos.php');
if(ISSET($_POST["enviar"])){
$conexionbd=conectar_bd();
$conex=conectar_bd();

$CLAVE=$_POST["CLAVE"];
$query="SELECT * FROM `SANGRE` WHERE CLAVE='".$CLAVE."';";
$RESULTADO=mysql_query($query,$conexionbd);

$query2="SELECT * FROM `ALTAS` WHERE CLAVE='".$CLAVE."';";
$conexionbd2=conectar_bd();
$Resultado2=mysql_query($query2,$conexionbd2);

$REGISTRO=mysql_fetch_assoc($RESULTADO);
$DATOS=mysql_fetch_assoc($Resultado2);
if($REGISTRO && $DATOS){
$FECHA=$DATOS["FECHA"];
$HORA=$DATOS["HORA"];
$NOMBRE=$DATOS["NOMBRE"];
$EDAD=$DATOS["EDAD"];
$SEXO=$DATOS["SEXO"];

$GLUCOSA=$REGISTRO["GLUCOSA"];
$BUN=$REGISTRO["BUN"];
$UREA=$REGISTRO["UREA"];
$CREATININA=$REGISTRO["CREATININA"];
$ACIDO_URICO=$REGISTRO["ACIDO_URICO"];
$COLESTEROL_TOTAL=$REGISTRO["COLESTEROL_TOTAL"];
$TRIGLICERIDOS=$REGISTRO["TRIGLICERIDOS"];
$LEUCOCITOS=$REGISTRO["LEUCOCITOS"];
$ERITROCITOS=$REGISTRO["ERITROCITOS"];
$HEMOGLOBINA=$REGISTRO["HEMOGLOBINA"];
$HEMATROCITOS=$REGISTRO["HEMATOCRITO"];
$VCM=$REGISTRO["VCM"];
$HCM=$REGISTRO["HCM"];
$CHCM=$REGISTRO["CHCM"];
$PLAQUETAS=$REGISTRO["PLAQUETAS"];
$RDW_CV=$REGISTRO["RDW_CV"];
$VMP=$REGISTRO["VMP"];
$COMENTARIOS=$REGISTRO["COMENTARIOS"];

date_default_timezone_set('America/Mexico_City');

$SALIDAout='<br/>
<p class="AlineacionD">
Fecha de impresion:<b>'.date("d-m-Y").'</b>
<br/>
Hora de impresion:<b>'.date("H:i:s").'</b>
<br/></br>
Fecha de muestras: <b>'.$FECHA.'</b><br/>
Hora de muestras:<b>'.$HORA.'</b>
</p>

<p class="AlineacionI">
<br/>

Nombre: <b>'.$NOMBRE.'</b> Edad: <b>'.$EDAD.'</b> Sexo biologico: <b>'.$SEXO.'</b>
<br/>
<br/>
Color: <b>'.$GLUCOSA.'</b>
<br/>

BUN: <b>'.$BUN.'</b>
<br/>

UREA: <b>'.$UREA.'</b>
<br/>

CREATININA: <b>'.$CREATININA.'</b>
<br/>

ACIDO URICO: <b>'.$ACIDO_URICO.'</b>
<br/>

COLESTEROL TOTAL: <b>'.$COLESTEROL_TOTAL.'</b>
<br/>

TRIGLICERIDOS: <b>'.$TRIGLICERIDOS.'</b>
<br/>

LEUCOCITOS: <b>'.$LEUCOCITOS.'</b>
<br/>

ERITROCITOS: <b>'.$ERITROCITOS.'</b>
<br/>

HEMOGLOBINA: <b>'.$HEMOGLOBINA.'</b>
<br/>

HEMATROCITOS: <b>'.$HEMATROCITOS.'</b>
<br/>

VCM: <b>'.$VCM.'</b>
<br/>

HCM: <b>'.$HCM.'</b>
<br/>

CHCM: <b>'.$CHCM.'</b>
<br/>

PLAQUETAS: <b>'.$PLAQUETAS.'</b>
<br/>

RDW-CV: <b>'.$RDW_CV.'</b>
<br/>

VMP: <b>'.$VMP.'</b>
<br/>
<br/>
Comentarios:<br/>
<b>'.$COMENTARIOS.'
</b>
</p>

';




//$vari=htmlspecialchars($SALIDAout);
//$query50="INSERT INTO `IMPRIMIR`(`ID`,`CLAVE`,`ESTUDIO`,`TEXTO`) VALUES('','".$CLAVE."','1','".$vari."');";
//$resultado50=mysql_query($query50,$conex);

}
}
?>

<div class="BoxSalida"><?php echo $SALIDAout; ?>
</div>

<?php
$conexion=conectar_bd();
$q2="INSERT INTO `IMPRIMIR`(`ID`,`CLAVE`,`ESTUDIO`,`TEXTO`) VALUES('','".$CLAVE."','1','$SALIDAout');";
$resultado5=mysql_query($q2,$conexion);
?>
<a href="Imprimir.php?CLAVE=<?php echo $CLAVE; ?>&ESTUDIO=1" target="_blank" class="boton">Imprimir</a>

</body>
</html>
