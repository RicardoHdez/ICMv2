<?php
    //Incluir la Conexion a la base de datos
    include('../conexionBD.php');
    //Variables    
    $Folio = $_GET['hipervinculo'];
    //Variables    
    $TipoPago = $_POST['caja_tipodepago'];
    $Mes = $_POST['caja_mes'];
    $Monto = $_POST['caja_monto'];
    $Deuda = $_POST['deuda'];
    //Cambiar el valor de deuda obtenido
    if($Deuda=="Debe"){
        $Deuda = "si";
    }else{
        $Deuda = "no";
    }        
    //Agregar FECHA, se encuentra en la variable hoy
    date_default_timezone_set("America/Mexico_City");
    $hoy = date("Y-m-d H:i:s");
    //Incluir la Conexion a la base de datos
                
    $SQL = "insert into pago(folio, monto, fecha, tipo_pago, mes, deuda)values('".$Folio."','".$Monto."','".$hoy."','".$TipoPago."','".$Mes."','".$Deuda."');";
    @mysql_query ($SQL);
    $SQL = "insert into pago_historial(folio, monto, fecha, tipo_pago, mes, deuda)values('".$Folio."','".$Monto."','".$hoy."','".$TipoPago."','".$Mes."','".$Deuda."');";
    @mysql_query ($SQL);

    $SQL_delete = "delete from pago where mes is null;";
    @mysql_query ($SQL_delete);

    echo '<script type="text/javascript">
    alert("Transaccion exitosa");
    window.location.assign("../perfil/perfil_alumno.php?hipervinculo='.$Folio.'");
    </script>';
?>