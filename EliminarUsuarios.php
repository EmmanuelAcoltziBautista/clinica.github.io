<?php
include("Basedatos.php");
$conexionbd=conectar_bd();
$query="SELECT * FROM `USUARIOS`;";
$resultado=mysql_query($query,$conexionbd);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar empleados</title>
<style type="text/css">
select{
font-size:20px;
margin:3px;
padding:3px;

}

</style>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<a href="Administrador.php">Regresar</a>
<a href="index.php">Cerrar sesión</a>
<center>
<h1>Eliminar empleados</h1>
<form method="post">
<select id="Empleado" name="Empleado">
<?php
while($res=mysql_fetch_assoc($resultado)){
echo"<option value='".$res["NOMBRE"]."'>".$res["NOMBRE"]."</option>";
}
?>
</select>
<select id="Sector" name="Sector">
<?php
$conexio=conectar_bd();
$result=mysql_query($query,$conexio);
while($resulta=mysql_fetch_assoc($result)){
echo"<option value='".$resulta["SECTOR"]."'>".$resulta["SECTOR"]."</option>";
}
?>
</select>
<input type="submit" id="Enviar" name="Enviar" value="Eliminar" class="boton">
</form>
<?php
if(ISSET($_POST["Enviar"])){
$conex=conectar_bd();
$NOMBRE=$_POST["Empleado"];
$sector=$_POST["Sector"];
$que="DELETE FROM `USUARIOS` WHERE NOMBRE='".$NOMBRE."' AND SECTOR='".$sector."';";
$resu=mysql_query($que,$conex);
if($resu){
echo"<script>alert('El empleado fue eliminado');document.location.href='EliminarUsuarios.php';</script>";
}
}
?>
</body>
</html>
