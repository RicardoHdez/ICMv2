<?php
    include('../conexionBD.php');
    //Variables    
    $Plantel = $_POST['TXT_Plantel'];
    $Nombre = $_POST['TXT_Nombre'];
    $Paterno = $_POST['TXT_Paterno'];
    $Materno = $_POST['TXT_Materno'];
    $Turno = $_POST['TXT_Turno'];
    $Casa = $_POST['TXT_Casa'];
    $Cel = $_POST['TXT_Cel'];
    $Email = $_POST['TXT_Email'];
    //Incluir la Conexion a la base de datos
    // $consultaRegistro = mysql_query("select * from alumnos where nombre like '".$Nombre."' and ap_paterno like '".$Paterno."' and ap_materno like '".$Materno."'");
    //     if($row = mysql_fetch_array($consultaRegistro)){
    //         print("<br> <h2>El alumno ya se encuentra registrado</h2>");
    //     }else{
    $SQL = "insert into alumnos(nombre,ap_paterno,ap_materno,escuela,turno,tel_casa,tel_cel,email)values('".$Nombre."','".$Paterno."','".$Materno."','".$Plantel."','".$Turno."','".$Casa."','".$Cel."','".$Email."');";
    @mysql_query ($SQL);
    //    }
    $resultado_id = mysql_query("select @@identity as id");
    if($row = mysql_fetch_array($resultado_id)){
        $NumeroFolio = trim($row[0]);
    }else{
        print("<br> <h1>Error de base de datos</h1>");
    }
    $resultado = mysql_query("select * from alumnos where folio='".$NumeroFolio."'");

    echo '<script type="text/javascript">
    alert("Alumno registrado");
    window.location.assign("../perfil/perfil_alumno.php?hipervinculo='.$NumeroFolio.'");
    </script>';
?>