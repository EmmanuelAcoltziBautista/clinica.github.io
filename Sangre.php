<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<a href="Laboratorista.php">Regresar</a>
<a href="index.php">Cerrar sesión</a>
<center>
<h1>ES</h1>

<form method="post">
<label for="CLAVE">Clave:</label>
<input type="text" id="CLAVE" name="CLAVE" required>
<input type="submit" id="Enviar" name="Enviar" value="Mostrar" class="boton">
</form>


<?php
include("Basedatos.php");
$CLAVE="";
$GLUCOSA="";

$BUN="";
$UREA="";
$CREATININA="";
$ACIDO_URICO="";
$COLESTEROL_TOTAL="";
$TRIGLICERIDOS="";
$LEUCOCITOS="";
$ERITROCITOS="";
$HEMOGLOBINA="";
$HEMATROCITOS="";
$VCM="";
$HCM="";
$CHCM="";
$PLAQUETAS="";
$RDW_CV="";
$VMP="";
$COMENTARIOS=$registro["COMENTARIOS"];
if(ISSET($_POST["Enviar"])){
$conexionbd=conectar_bd();
$CLAVE=$_POST["CLAVE"];
$query="SELECT * FROM `SANGRE` WHERE CLAVE='".$CLAVE."'";
$RESULTADO=mysql_query($query,$conexionbd);
if($registro=mysql_fetch_assoc($RESULTADO)){

$CLAVE=$registro["CLAVE"];
$GLUCOSA=$registro["GLUCOSA"];
$BUN=$registro["BUN"];
$UREA=$registro["UREA"];
$CREATININA=$registro["CREATININA"];
$ACIDO_URICO=$registro["ACIDO_URICO"];
$COLESTEROL_TOTAL=$registro["COLESTEROL_TOTAL"];
$TRIGLICERIDOS=$registro["TRIGLICERIDOS"];
$LEUCOCITOS=$registro["LEUCOCITOS"];
$ERITROCITOS=$registro["ERITROCITOS"];
$HEMOGLOBINA=$registro["HEMOGLOBINA"];
$HEMATROCITOS=$registro["HEMATOCRITO"];
$VCM=$registro["VCM"];
$HCM=$registro["HCM"];
$CHCM=$registro["CHCM"];
$PLAQUETAS=$registro["PLAQUETAS"];
$RDW_CV=$registro["RDW_CV"];
$VMP=$registro["VMP"];
$COMENTARIOS=$registro["COMENTARIOS"];
}
}

?>
<form method='post'>
<input type='text' id='CLAVE1' name='CLAVE1' readonly="readonly" value='<?php echo $CLAVE; ?>'></input>
<h3>QUIMICA CLINICA</h3>
<label for="GLUCOSA">Glucosa:</label>
<input type='text' id='GLUCOSA' name='GLUCOSA' value='<?php echo $GLUCOSA; ?>'></input>
<h4>Nitrogeno ureico</h4>
<label for="BUN">BUN:</label>
<input type='text' id='BUN' name='BUN' value='<?php echo $BUN; ?>'></input>

<label for="UREA">UREA:</label>
<input type='text' id='UREA' name='UREA' value='<?php echo $UREA; ?>'></input>

<label for="CREATININA">CREATININA:</label>
<input type='text' id='CREATININA' name='CREATININA' value='<?php echo $CREATININA; ?>'></input>
<br/>
<label for="ACIDO_URICO">ACIDO URICO:</label>
<input type='text' id='ACIDO_URICO' name='ACIDO_URICO' value='<?php echo $ACIDO_URICO; ?>'></input>

<label for="COLESTEROL_TOTAL">COLESTEROL TOTAL:</label>
<input type='text' id='COLESTEROL_TOTAL' name='COLESTEROL_TOTAL' value='<?php echo $COLESTEROL_TOTAL; ?>'></input>

<br/>
<label for="TRIGLICERIDOS">TRIGLICERIDOS:</label>
<input type='text' id='TRIGLICERIDOS' name='TRIGLICERIDOS' value='<?php echo $TRIGLICERIDOS; ?>'></input>
<h3>HEMATOLOGIA</h3>
<label for="LEUCOCITOS">LEUCOCITOS:</label>
<input type='text' id='LEUCOCITOS' name='LEUCOCITOS' value='<?php echo $LEUCOCITOS; ?>'></input>

<label for="ERITROCITOS">ERITROCITOS:</label>
<input type='text' id='ERITROCITOS' name='ERITROCITOS' value='<?php echo $ERITROCITOS; ?>'></input>

<label for="HEMOGLOBINA">HEMOGLOBINA:</label>
<input type='text' id='HEMOGLOBINA' name='HEMOGLOBINA' value='<?php echo $HEMOGLOBINA; ?>'></input>

<label for="HEMATOCRITO">HEMATOCRITO:</label>
<input type='text' id='HEMATOCRITO' name='HEMATOCRITO' value='<?php echo $HEMATROCITOS; ?>'></input>

<label for="VCM">VCM:</label>
<input type='text' id='VCM' name='VCM' value='<?php echo $VCM; ?>'></input>

<label for="HCM">HCM:</label>
<input type='text' id='HCM' name='HCM' value='<?php echo $HCM; ?>'></input>
<br/>
<label for="CHCM">CHCM:</label>
<input type='text' id='CHCM' name='CHCM' value='<?php echo $CHCM; ?>'></input>

<label for="PLAQUETAS">PLAQUETAS:</label>
<input type='text' id='PLAQUETAS' name='PLAQUETAS' value='<?php echo $PLAQUETAS; ?>'></input>

<label for="RDW-CV">RDW-CV:</label>
<input type='text' id='RDW-CV' name='RDW-CV' value='<?php echo $RDW_CV; ?>'></input>
<br/>
<label for="VMP">VMP:</label>
<input type='text' id='VMP' name='VMP' value='<?php echo $VMP; ?>'></input>
<br/>
<label for="COMENTARIOS">Comentarios:</label>
<textarea id="COMENTARIOS" name="COMENTARIOS"><?php echo $COMENTARIOS; ?></textarea>

<input type='submit' id='PAGO' name='PAGO' value='Agregar resultados' class="boton">
</form>


<?php
if(ISSET($_POST['PAGO'])){
$CLAVE1=$_POST['CLAVE1'];

$GLUCOSA1=$_POST['GLUCOSA'];
$NITROGENO_UREICO1=$_POST["NITROGENO_UREICO"];
$BUN1=$_POST["BUN"];
$UREA1=$_POST["UREA"];
$CREATININA1=$_POST["CREATININA"];
$ACIDO_URICO1=$_POST["ACIDO_URICO"];
$COLESTEROL_TOTAL1=$_POST["COLESTEROL_TOTAL"];
$TRIGLICERIDOS1=$_POST["TRIGLICERIDOS"];
$LEUCOCITOS1=$_POST["LEUCOCITOS"];
$ERITROCITOS1=$_POST["ERITROCITOS"];
$HEMOGLOBINA1=$_POST["HEMOGLOBINA"];
$HEMATOCRITO1=$_POST["HEMATOCRITO"];
$VCM1=$_POST["VCM"];
$HCM1=$_POST["HCM"];
$CHCM1=$_POST["CHCM"];
$PLAQUETAS1=$_POST["PLAQUETAS"];
$RDW_CV1=$_POST["RDW-CV"];
$VMP1=$_POST["VMP"];
$COMENTARIOS1=$_POST["COMENTARIOS"];

$conexionbd5=conectar_bd();
$AG='GLUCOSA="'.$GLUCOSA1.'", BUN="'.$BUN1.'", UREA="'.$UREA1.'", CREATININA="'.$CREATININA1.'", ACIDO_URICO="'.$ACIDO_URICO1.'", COLESTEROL_TOTAL="'.$COLESTEROL_TOTAL1.'",TRIGLICERIDOS="'.$TRIGLICERIDOS1.'", LEUCOCITOS="'.$LEUCOCITOS1.'", ERITROCITOS="'.$ERITROCITOS1.'", HEMOGLOBINA="'.$HEMOGLOBINA1.'", HEMATOCRITO="'.$HEMATOCRITO1.'", VCM="'.$VCM1.'", HCM="'.$HCM1.'", CHCM="'.$CHCM1.'", PLAQUETAS="'.$PLAQUETAS1.'",RDW_CV="'.$RDW_CV1.'", VMP="'.$VMP1.'", COMENTARIOS="'.$COMENTARIOS1.'"';
$query6="UPDATE `SANGRE` SET ".$AG." WHERE CLAVE='".$CLAVE1."';";


//echo $query6;
$resultado1=mysql_query($query6,$conexionbd5);
$conexion6=conectar_bd();
//$query7='UPDATE `GANANCIAS` SET GANANCIAS=GANANCIAS+'.$MONTO1.' WHERE ID=1';
//$SALIDAG=mysql_query($query7,$conexion6);
if($resultado1){
echo'<script>alert("Los resultados se agregaron con exito");</script>';
}
}
?>
</body>
</html>
