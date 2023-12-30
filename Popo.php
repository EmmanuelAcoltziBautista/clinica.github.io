<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMF</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<a href="Laboratorista.php">Regresar</a>
<a href="index.php">Cerrar sesión</a>
<center>
<h1>EMF</h1>

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
$CONSISTENCIA1="";
$PH1="";
$COLOR1="";
$COM="";
$OLOR1="";
$CANTIDAD1="";
if(ISSET($_POST["Enviar"])){
$conexionbd=conectar_bd();
$CLAVE=$_POST["CLAVE"];
$query="SELECT * FROM `POPO` WHERE CLAVE='".$CLAVE."'";
$RESULTADO=mysql_query($query,$conexionbd);
if($registro=mysql_fetch_assoc($RESULTADO)){
$CLAVE1=$registro["CLAVE"];
$CANTIDAD1=$registro["CANTIDAD"];
$OLOR1=$registro["OLOR"];
$CONSISTENCIA1=$registro["CONSISTENCIA"];
$PH1=$registro["PH"];
$COLOR1=$registro["COLOR"];
$COM=$registro["COMENTARIOS"];

}
}

?>
<form method='post'>
<input type='text' id='CLAVE1' name='CLAVE1' readonly="readonly" value='<?php echo $CLAVE1; ?>'required></input>

<label for="Color">Color:</label>
<input type='text' id='Color' name='Color' value="<?php echo $COLOR1; ?>" required></input>

<label for="Consistencia">Consistencia:</label>
<input type='text' id='Consistencia' name='Consistencia' value="<?php echo $CONSISTENCIA1; ?>" required></input>

<label for="Cantidad">Cantidad:</label>
<input type='text' id='Cantidad' name='Cantidad' value="<?php echo $CANTIDAD1; ?>" required></input>

<label for="Olor">Olor:</label>
<input type='text' id='Olor' name='Olor' value="<?php echo $OLOR1; ?>" required></input>

<label for="ph">PH:</label>
<input type='text' id='ph' name='ph' value="<?php echo $PH1; ?>" required></input>

<label for="Comentarios">Comentarios:</label>
<textarea id='Comentarios' name='Comentarios' required><?php echo $COM; ?></textarea>
<input type='submit' id='Registrar' name='Registrar' value='Registrar' class="boton">
</form>


<?php
if(ISSET($_POST['Registrar'])){

$CLAVE1=$_POST['CLAVE1'];
$conexionbd5=conectar_bd();
$CONSISTENCIA=$_POST["Consistencia"];
$PH=$_POST["ph"];
$CANTIDAD=$_POST["Cantidad"];
$OLOR=$_POST["Olor"];
$Color=$_POST["Color"];
$Comentarios=$_POST["Comentarios"];
$query6='UPDATE `POPO` SET CONSISTENCIA="'.$CONSISTENCIA.'", PH="'.$PH.'", COLOR="'.$Color.'", CANTIDAD="'.$CANTIDAD.'",
 OLOR="'.$OLOR.'" , COMENTARIOS="'.$Comentarios.'"  WHERE CLAVE="'.$CLAVE1.'";';
//echo $query6;
$resultado1=mysql_query($query6,$conexionbd5);
if($resultado1){
echo'<script>alert("El registro se actualizo");</script>';
}
}
?>
</body>
</html>
