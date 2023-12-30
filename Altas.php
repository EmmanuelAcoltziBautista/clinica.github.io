<html>
<head>
<title>Altas</title>
<link rel="stylesheet" href="estilos.css">
<style type="text/css">
.Caja{
border:3px solid #000000;
background:#ffffff;
width:20%;
margin:3px;
padding:3px;
font-size:15px;
font-family:Arial;
color:rgb(0,0,0);
font-weight:bold;

}
select{
font-size:20px;
margin:3px;
padding:3px;

}
.che{
font-size:20px;
font-family:Arial;
}
</style>
</head>
<body>
<a href="Recepcion.php">Regresar</a>
<a href="index.php">Cerrar sesión</a>
<center>
<h1>Altas</h1>


<form method="post" action="">

<label for="Nombre">Nombre:</label>
<input type="text" id="Nombre" name="Nombre" required>
<br/>
<label for="Edad">Edad:</label>
<input type="number" id="Edad" name="Edad" required>
<br/>
<label for="Direccion">Direccion:</label>
<textarea id="Direccion" name="Direccion" required></textarea>
<br/>
<label for="Sexo">Sexo:</label>
<select id="Sexo" name="Sexo">
<option value="M">Masculino</option>
<option value="F">Femenino</option>
</select>
<br/>

<input type="checkbox" class="che" id="ESangre" name="ESangre" value="si">ES<img src="images/prueba.png"></input>
<input type="checkbox" class="che" id="EPopo" name="EPopo" value="si">EMF<img src="images/popo.png"></input>
<input type="checkbox" class="che" id="EOrina" name="EOrina" value="si" >EGO<img src="images/orina.png"></input>
<br/>


<input type="submit" id="En" name="En" value="Registrar" class="boton">
</form>
<?php
error_reporting(0);
date_default_timezone_set('America/Mexico_City');
//echo "hola1";
$IMPRESION="";
include("Basedatos.php");
if(isset($_POST["En"])){
//echo"entre";

$NOMBRE=$_POST["Nombre"];
$EDAD=$_POST["Edad"];
$DIRECCION=$_POST["Direccion"];
$SEXO=$_POST["Sexo"];
$SANGRE=$_POST["ESangre"];
$ORINA=$_POST["EOrina"];
$POPO=$_POST["EPopo"];






$CONEX=conectar_bd();
$qi="SELECT * FROM `ALTAS`";
$res=mysql_query($qi,$CONEX);
$id=0;
while($re=mysql_fetch_assoc($res)){

$id=$re["ID"]+1;
}


$FECHA=date('d-m-Y');
$hour=date('H');
//echo $hour;
$HORA=date('H:i.s');


$conexionbd=conectar_bd();
$clave=$id."".$EDAD."".$SEXO;
$q1="INSERT INTO `ALTAS`(`ID`,`CLAVE`,`NOMBRE`,`EDAD`,`SEXO`,`DIRECCION`,`SANGRE`,`ESQUEREMENTO`,`ORINA`,`FECHA`,`HORA`) VALUES 
('','".$clave."','".$NOMBRE."','".$EDAD."','".$SEXO."','".$DIRECCION."','".$SANGRE."','".$POPO."','".$ORINA."','".$FECHA."','".$HORA."')";
$resultado=mysql_query($q1,$conexionbd);
$PRECIOTOTAL=0;
if($resultado){
//echo "agregado";

$CONEXIONDINERO=conectar_bd();


/*SOP*/

//POPO
if($POPO=="si"){
$queryDinero="SELECT * FROM `PRECIOS` WHERE ID=3";
$RESULTADODINERO=mysql_query($queryDinero,$CONEXIONDINERO);

while($salidaDinero=mysql_fetch_assoc($RESULTADODINERO)){
$PRECIOTOTAL=$PRECIOTOTAL+$salidaDinero["PRECIO"];
}

$qSangre="INSERT INTO `POPO`(`ID`,`CLAVE`,`COLOR`,`CONSISTENCIA`,`CANTIDAD`,`OLOR`,`PH`,`COMENTARIOS`) VALUES('','".$clave."','','','','','','')";
$cSangre=conectar_bd();
$salidaSangre=mysql_query($qSangre,$cSangre);
}
//ORINA
if($ORINA=="si"){
$queryDinero="SELECT * FROM `PRECIOS` WHERE ID=2";
$RESULTADODINERO=mysql_query($queryDinero,$CONEXIONDINERO);

while($salidaDinero=mysql_fetch_assoc($RESULTADODINERO)){
$PRECIOTOTAL=$PRECIOTOTAL+$salidaDinero["PRECIO"];
}

$qSangre="INSERT INTO `ORINA`(`ID`,`CLAVE`,`EMBARAZO`,`PH`,`COLOR`,`COMENTARIOS`) VALUES('','".$clave."','','','','')";
$cSangre=conectar_bd();
$salidaSangre=mysql_query($qSangre,$cSangre);
}
//SANGRE
if($SANGRE=="si"){
$queryDinero="SELECT * FROM `PRECIOS` WHERE ID=1";
$RESULTADODINERO=mysql_query($queryDinero,$CONEXIONDINERO);

while($salidaDinero=mysql_fetch_assoc($RESULTADODINERO)){
$PRECIOTOTAL=$PRECIOTOTAL+$salidaDinero["PRECIO"];
}

$qSangre="INSERT INTO `SANGRE`(`ID`,`CLAVE`,`COMENTARIOS`) VALUES('','".$clave."','')";
$cSangre=conectar_bd();
$salidaSangre=mysql_query($qSangre,$cSangre);
}

//echo "EL PRECIO ES: ".$PRECIOTOTAL;

$coneTicket=conectar_bd();
$qTicket="INSERT INTO `TICKET`(`ID`,`CLAVE`,`MONTO`,`CONCEPTO`) VALUES ('','".$clave."','".$PRECIOTOTAL."','No pagado');";
$salidaTicket=mysql_query($qTicket,$coneTicket);
$IMPRESION="Fecha: ".$FECHA.
"<br/> Hora: ".$HORA.
"<br/> Su clave es: ".$clave.
"<br/> El total a pagar es: $".$PRECIOTOTAL." MXN".
"<br/> Concepto: No pagado";
echo"<script>function Imprimir(){
print();
}</script>";
?>
<p class="Caja">
<?php echo $IMPRESION; ?>
</p>
<?php
//echo"<br/><input type='button' onClick='Imprimir()' value='Imprimir'>";
}else{
echo "no se agrego";
}
}
?>
</br>
<a href='Imp.php?RECIBO=<?php echo $IMPRESION; ?>' target="_blank" class="boton">Imprimir</a>
</body>
</html>
