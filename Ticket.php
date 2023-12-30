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
<a href="index.php">Cerrar sesión</a>
<center>
<h1>Ticket</h1>

<form method="post">
<label for="CLAVE">Clave:</label>
<input type="text" id="CLAVE" name="CLAVE" placeholder="CLAVE" required>
<input type="submit" id="Enviar" name="Enviar" value="Mostrar" class="boton">
</form>


<?php
include("Basedatos.php");
$CLAVE="";
$MONTOS="";
if(ISSET($_POST["Enviar"])){
$conexionbd=conectar_bd();
$CLAVE=$_POST["CLAVE"];
$query="SELECT * FROM `TICKET` WHERE CLAVE='".$CLAVE."'";
$RESULTADO=mysql_query($query,$conexionbd);
if($registro=mysql_fetch_assoc($RESULTADO)){
$MONTOS=$registro["MONTO"];
$concepto=$registro["CONCEPTO"];
//echo "<p class >El registro de ".$registro["CLAVE"]." tiene un monto de ".$registro["MONTO"]." CONCEPTO:".$registro["CONCEPTO"];
if($concepto=="Pagado"){
echo "
<script>
alert('El cliente a pagado');

</script>

";
$MONTOS=0;
}

}
}

?>
<form method='post'>
<label for="CLAVE1">Clave:</label>

<input type='text' id='CLAVE1' name='CLAVE1' readonly="readonly" value='<?php echo $CLAVE; ?>'required></input>
<label for="MONTO1">Monto:</label>
<input type='text' id='MONTO1' name='MONTO1' readonly="readonly" value='<?php echo $MONTOS; ?>' required></input>
<input type='submit' id='PAGO' name='PAGO' value='Acreditar pago' class="boton">
</form>


<?php
if(ISSET($_POST['PAGO'])){
$CLAVE1=$_POST['CLAVE1'];
$MONTO1=$_POST['MONTO1'];
$conexionbd5=conectar_bd();
$query6='UPDATE `TICKET` SET CONCEPTO="Pagado" WHERE CLAVE="'.$CLAVE1.'";';
//echo $query6;
$resultado1=mysql_query($query6,$conexionbd5);
$conexion6=conectar_bd();
$query7='UPDATE `GANANCIAS` SET GANANCIAS=GANANCIAS+'.$MONTO1.' WHERE ID=1';
$SALIDAG=mysql_query($query7,$conexion6);
if($SALIDAG && $resultado1){
echo'<script>alert("El pago se realizo con exito");</script>';
}
}
?>
</body>
</html>
