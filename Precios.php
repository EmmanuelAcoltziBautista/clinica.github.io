<?php
include('Basedatos.php');
$conexionbd=conectar_bd();
$query="SELECT * FROM `PRECIOS`;";
$resultado=mysql_query($query,$conexionbd);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precios</title>
<link rel="stylesheet" href="estilos.css">
<style type="text/css">
select{
font-size:20px;
margin:3px;
padding:3px;

}

</style>
</head>
<body>
<a href="Administrador.php">Regresar</a>
<a href="index.php">Cerrar sesión</a>
<center>
<h1>Precios</h1>
<table border="1">
<tr>
<th>Estudio</th>
<th>Precio</th>
</tr>
<ul>
<?php
while($r1=mysql_fetch_assoc($resultado)){
echo"<tr><td>".$r1["ESTUDIO"]."</td><td>".$r1["PRECIO"]."</td>";
}
?>

<br/>

<form method="post">
<select id="Estudio" name="Estudio">
<?php
$cone=conectar_bd();
$RESU=mysql_query($query,$cone);
while($r2=mysql_fetch_assoc($RESU)){
echo"<option value=".$r2["ESTUDIO"].">".$r2["ESTUDIO"]."</option>";
}
?>
</select>
<label for="Precio"></label>
<input type="text" id="Precio" name="Precio" placeholder="Precio">
<input type="submit" id="Enviar" name="Enviar" value="Actualizar" class="boton">

</form>
<?php
$conexion11=conectar_bd();
if(ISSET($_POST["Enviar"])){
$PRECIO=$_POST["Precio"];
$ESTUDIO=$_POST["Estudio"];
$query2="UPDATE `PRECIOS` SET PRECIO=".$PRECIO." WHERE ESTUDIO='".$ESTUDIO."';";
//echo $query2;
$SALIDA=mysql_query($query2,$conexion11);
//if($SALIDA){
echo"<script>alert('La actualizacion se realizo con exito');document.location.href='Precios.php';</script>";
//}
}
?>
</center>
</body>
</html>
