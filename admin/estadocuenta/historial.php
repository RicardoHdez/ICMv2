<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Instituto Comercial Mexico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/alumnos.css">
    <script src="../js/jquery3.1.1.min.js" ></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body style="background:#D8D8D8;">

<nav class="navbar navbar-default" style="background:#04B4AE;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../" style="background:#D8D8D8; color: #000000; font-family: Georgia, 'Times New Roman', Times, serif; font-size: 30px;">Instituto Comercial Mexico</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="../perfil/perfil.html" style="color: #FFFFFF; font-size: 20px;">Perfil</a></li>
                <li><a href="../alumnos/alumnos.php" style="color: #FFFFFF; font-size: 20px;">Alumnos</a></li>
                <li><a href="./estadocuenta.php" style="color: #FFFFFF; font-size: 20px;">Estado de cuenta</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--Iniciar Sesion-->
                <li><a href="../../" style="color: #000000; font-size: 15px;">Cerrar sesion</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div>
    <p class="subtitulo" style="text-align: center;">Estado de cuenta</p>
</div>
<!--Termina subtitulo-->


<div class="datagrid">
<table align="center" border="0" cellpadding="2" cellspacing="2">
    <thead>
        <th width='15%' colspan="1" rowspan="1" align="center">Plantel</th>
        <th width='10%' colspan="1" rowspan="1" align="center">Turno</th>
        <th width='15%' colspan="1" rowspan="1" align="center">Nombre</th>
        <th width='10%' colspan="1" rowspan="1" align="center">Mes</th>
        <th width='10%' colspan="1" rowspan="1" align="center">Tipo de pago</th>
        <th width='10%' colspan="1" rowspan="1" align="center">Monto</th>
        <th width='10%' colspan="1" rowspan="1" align="center">Debe</th>
        <th width='10%' colspan="1" rowspan="1" align="center">Fecha</th>
    </thead>

        <?php
            //Numero de folio
            $folio = $_GET['hipervinculo'];
            //Incluir la Conexion a la base de datos
            include('../conexionBD.php');
            
            $ConsultaPago = mysql_query("select * from pago_historial where folio ='".$folio."'");
            @mysql_query ($ConsultaPago);

            while($row = mysql_fetch_array($ConsultaPago))
            {
                $mes = $row['mes'];
                $tipo_pago = $row['tipo_pago'];
                $monto = $row['monto'];
                $debe = $row['deuda'];
                $fecha = $row['fecha'];
                
                $ConsultaAlumno = mysql_query("select * from alumnos where folio ='".$folio."'");
                @mysql_query ($ConsultaAlumno);

                while($row_1 = mysql_fetch_array($ConsultaAlumno))
                {
                    $plantel = $row_1['escuela'];
                    $nombre = $row_1['nom_completo'];
                    $turno = $row_1['turno'];
                }

                //  Empieza la Tabla
                if($row['deuda'] == "si"){
                    $ConsultaDeuda = "<img id='sidebe' src='../img/rojo.png' align='center' width='25px'>";
                }else{
                    $ConsultaDeuda = "<img id='nodebe' src='../img/verde.png' align='center' width='25px'>";
                }
                echo "<tr>";
                echo "<td>".$plantel."</td>";
                echo "<td>".$turno."</td>";
                echo "<td>".$nombre."</td>";
                echo "<td>".$row['mes']."</td>";
                echo "<td>".$row['tipo_pago']."</td>";
                echo "<td>$ ".$row['monto']."</td>";
                echo "<td>".$ConsultaDeuda."</td>";
                echo "<td>".$row['fecha']."</td>";
                echo "</tr>";
                    
            }
        ?>
        </table>
</br>
</div>
</br>
<!--Empieza pie de pagina-->
<footer class="footer" style="background:#04B4AE; text-align: center;">
        <p id="pagina" style="color: #FFFFFF; font-family: 'Times New Roman', Times, serif;font-size: 20px;">Pagina creada por:</p>
        <a href="http://www.lookapp.mx/"><img src="../img/lookapp.png" style="width: 150px;"/></a>
</footer>

</body>
</html>