<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EGO</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<a href="Laboratorista.php">Regresar</a>
<a href="index.php">Cerrar sesión</a>
<center>
<h1>EGO</h1>

<form method="post">
<label for="CLAVE">Clave:</label>
<input type="text" id="CLAVE" name="CLAVE" required>
<input type="submit" id="Enviar" name="Enviar" value="Mostrar" class="boton">
</form>


<?php
include("Basedatos.php");
$CLAVE="";
$CLAVE1="";
$MONTO="";
$EMBARAZO1="";
$PH1="";
$COLOR1="";
$COM="";
if(ISSET($_POST["Enviar"])){
$conexionbd=conectar_bd();
$CLAVE=$_POST["CLAVE"];
$query="SELECT * FROM `ORINA` WHERE CLAVE='".$CLAVE."'";
$RESULTADO=mysql_query($query,$conexionbd);
if($registro=mysql_fetch_assoc($RESULTADO)){
$CLAVE1=$registro["CLAVE"];
$EMBARAZO1=$registro["EMBARAZO"];
$PH1=$registro["PH"];
$COLOR1=$registro["COLOR"];
$COM=$registro["COMENTARIOS"];
}
}

?>
<form method='post'>
<input type='text' id='CLAVE1' name='CLAVE1' readonly="readonly" value='<?php echo $CLAVE1; ?>'required></input>
<label for="Embarazo">Emabarazo:</label>
<input type='text' id='Embarazo' name='Embarazo' value="<?php echo $EMBARAZO1; ?>" required></input>
<label for="ph">PH:</label>
<input type='text' id='ph' name='ph' value="<?php echo $PH1; ?>" required></input>
<label for="Color">Color:</label>
<input type='text' id='Color' name='Color' value="<?php echo $COLOR1; ?>" required></input>
<label for="Comentarios">Comentarios:</label>
<textarea id='Comentarios' name='Comentarios' required><?php echo $COM; ?></textarea>
<input type='submit' id='Registrar' name='Registrar' value='Registrar' class="boton">
</form>


<?php
if(ISSET($_POST['Registrar'])){

$CLAVE1=$_POST['CLAVE1'];
$MONTO1=$_POST['MONTO1'];
$conexionbd5=conectar_bd();
$EMBARAZO=$_POST["Embarazo"];
$PH=$_POST["ph"];
$Color=$_POST["Color"];
$Comentarios=$_POST["Comentarios"];
$query6='UPDATE `ORINA` SET EMBARAZO="'.$EMBARAZO.'", PH="'.$PH.'", COLOR="'.$Color.'", COMENTARIOS="'.$Comentarios.'"  WHERE CLAVE="'.$CLAVE1.'";';
//echo $query6;
$resultado1=mysql_query($query6,$conexionbd5);
if($resultado1){
echo'<script>alert("El registro se actualizo");</script>';
}
}
?>
</body>
</html>
