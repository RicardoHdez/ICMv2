<?php
    include('../conexionBD.php');

    $mes = $_GET['mes'];
    $monto = $_GET['monto'];
    $folio = $_GET['folio'];
    $tipo_pago = $_GET['tipo_pago'];
    $fecha = $_GET['fecha'];
    //Agregar FECHA, se encuentra en la variable hoy
    date_default_timezone_set("America/Mexico_City");
    $fechaActual = date("Y-m-d H:i:s");

    $SQL = ("update pago set deuda = 'no' WHERE folio = '".$folio."' and mes = '".$mes."' and tipo_pago = '".$tipo_pago."' and fecha = '".$fecha."';");
    @mysql_query ($SQL);
    $SQL_P = ("update pago set fecha = '".$fechaActual."' WHERE folio = '".$folio."' and mes = '".$mes."' and tipo_pago = '".$tipo_pago."' and deuda = 'no';");
    @mysql_query ($SQL_P);
    $historialSQL = "insert into pago_historial(folio, monto, fecha, tipo_pago, mes, deuda)values('".$folio."','".$monto."','".$fechaActual."','".$tipo_pago."','".$mes."','no');";
    @mysql_query ($historialSQL);

    echo '<script type="text/javascript">
    alert("El alumno ya pago");
    window.location.assign("estado_cuenta.php?hipervinculo='.$folio.'");
    </script>';
?>