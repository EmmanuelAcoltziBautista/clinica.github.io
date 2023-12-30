<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<center>




<h1>Login</h1>
<img src="images/usuario.png">
    <form method="post">
    <label for="Usuario"><b>N. Usuario</b></label>
    <input type="number" id="Usuario" name="Usuario" placeholder="Usuario:" required>
<br/>
  
  <label for="Contrasena"><b>Contrasena</b></label>
    <input type="password" id="Contrasena" name="Contrasena" placeholder="Contraseña:" required>
<br/>
 
   <input type="submit" class="boton" id="Enviar" name="Enviar" value="Ingresar">
    </form >
    <?php
    //En esta seccion pregunto si toco el boton
    
    if(ISSET($_POST["Enviar"])){

    include("Basedatos.php");
    $conexionbd=conectar_bd();
    $Usuario=$_POST["Usuario"];
    $Contrasena=$_POST["Contrasena"];

    $query="SELECT * FROM `USUARIOS` WHERE ID=".$Usuario." AND CONTRASENA='".$Contrasena."';";
    $ConsultaUsuarios=mysql_query($query,$conexionbd);
        if($res=mysql_fetch_assoc($ConsultaUsuarios)){
            $query2="SELECT `SECTOR` FROM `USUARIOS` WHERE ID=$Usuario";
            $ConsultaSector=mysql_query($query2,$conexionbd);
		$r=mysql_fetch_assoc($ConsultaSector);
		if($r["SECTOR"]=="Administrador"){
		header('Location: Administrador.php');
		}
		if($r["SECTOR"]=="Laboratorista"){
		header('Location: Laboratorista.php');
	}
		if($r["SECTOR"]=="Recepcion"){
		header('Location: Recepcion.php');
	}
            	if($r["SECTOR"]=="Contador"){
		header('Location: Contador.php');
	}
        }else{
            echo"<script>alert('El usuario o la contraseña son incorrectos');document.location.href='index.php';</script>";

        }

    }
    ?>
<!--footer>
 
</footer-->

</body>
</html>
