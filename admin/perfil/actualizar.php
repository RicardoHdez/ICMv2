<?php
    //Incluir la Conexion a la base de datos
    include('../conexionBD.php');
    //Variables    
    $Hipervinculo = $_GET['hipervinculo'];
    $Plantel = $_POST['TXT_Plantel'];
    $Nombre = $_POST['TXT_Nombre'];
    $Paterno = $_POST['TXT_Paterno'];
    $Materno = $_POST['TXT_Materno'];
    $Turno = $_POST['TXT_Turno'];
    $Casa = $_POST['TXT_Casa'];
    $Cel = $_POST['TXT_Cel'];
    $Email = $_POST['TXT_Email'];

    $Actualizar = "update alumnos set nombre='".$Nombre."', ap_paterno='".$Paterno."', ap_materno='".$Materno."', escuela='".$Plantel."', turno='".$Turno."', tel_casa='".$Casa."', tel_cel='".$Cel."', email='".$Email."' where folio ='".$Hipervinculo."'"; 
    @mysql_query ($Actualizar);

    echo '<script type="text/javascript">
    alert("Datos Actualizados");
    window.location.assign("../perfil/perfil_alumno.php?hipervinculo='.$Hipervinculo.'");
    </script>';
?>