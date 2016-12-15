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
    <table border="0" cellpadding="2" cellspacing="2">
        <thead>
        <form accept-charset="utf-8" method="POST" action="estadocuenta_buscar.php">
            <th width="250px" colspan="1" rowspan="1" align="center">
                <select id='Seleccion_Plantel' name="Seleccion_Plantel" class="form-control">
                    <option value="PLANTEL">PLANTEL</option>
                    <option value="IZTAPALAPA CENTRO">IZTAPALAPA CENTRO</option> 
                    <option value="METRO NATIVITAS">METRO NATIVITAS</option> 
                    <option value="PERIFERICO IZTAPALAPA">PERIFERICO IZTAPALAPA</option>
                    <option value="TORRES EJE 6 SUR">TORRES EJE 6 SUR</option> 
                    <option value="PALMAS NEZA">PALMAS NEZA</option> 
                    <option value="QUERETARO">QUERETARO</option> 
                    <option value="TLALTENCO">TLALTENCO</option> 
                    <option value="MANUEL CAÑAS">MANUEL CAÑAS</option> 
                    <option value="RINCONADA DE ARAGON">RINCONADA DE ARAGON</option> 
                </select>
                <button type="submit" class="btn btn-default btn-sm" style="color:#000000;">Buscar</button>
            </th> 
            <th width="150px" colspan="1" rowspan="1" align="center">
                <select name="Turno" id="Turno" class="form-control">
                    <option value="TURNO">Turno</option> 
                    <option value="8:00-11:00">8:00-11:00</option> 
                    <option value="11:00-14:00">11:00-14:00</option>
                    <option value="15:00-18:00">15:00-18:00</option>
                    <option value="Sabados">Sabados</option>
			    </select>
                <button type="submit" class="btn btn-default btn-sm" style="color:#000000;">Buscar</button>
            </th>
            <th width="250px" colspan="1" rowspan="1" align="center">
                <input type="text" name="B_Nombre" id="B_Nombre" value="" placeholder="Nombre" class="form-control">
                <button type="submit" class="btn btn-default btn-sm" style="color:#000000;">Buscar</button>
            </th>
            </form>
            <th width="250px" colspan="1" rowspan="1" align="center">Mes</th>
            <th width="250px" colspan="1" rowspan="1" align="center">Tipo de pago</th>
            <th width="250px" colspan="1" rowspan="1" align="center">Monto</th>
        </thead>

            <?php
                //Incluir la Conexion a la base de datos
                include('../conexionBD.php');
                @mysql_query ($SQL);
                //Consula de tabla alumnos
                $consulta_alumnos = mysql_query("select * from alumnos");
                $contador = 0;

                //while($row = mysql_fetch_array($consulta_alumnos))
                while($row = mysql_fetch_array($consulta_alumnos)){
                    echo "<tr>";
                    echo "<td>".$row['escuela']."</td>";//cada celda contiene reg, entre llaves el numero del campo
                    echo "<td>".$row['turno']."</td>";
                    echo "<td><a href='estado_cuenta.php?hipervinculo=".$row['folio']."'>".$row['nom_completo']."</a></td>";
                    $contador++;

                    if($contador== 1){ //Para las casillas de mes, tipo de pago y monto
                        echo "<td><input type='text' placeholder=Mes readonly='readonly' class='form-control' id='disabledInput' disabled></td>";
                        echo "<td><input type='text' placeholder='Tipo_pago' readonly='readonly' class='form-control'  id='disabledInput' disabled></td>";
                        echo "<td><div class='form-group'><label class='sr-only' for='exampleInputAmount'>Amount (in dollars)</label><div class='input-group'><div class='input-group-addon'>$</div><input type='text' class='form-control' id='exampleInputAmount' placeholder='Monto' disabled><div class='input-group-addon'>.00</div></div></div></td>";
                    }
                    if($contador==2){
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td><a href=''>Historial</a></td>";
                    }
                    echo "</tr>";
                }            
        ?>
    </table>
</div>

<!--Empieza pie de pagina-->
<footer class="footer" style="background:#04B4AE; text-align: center;">
        <p id="pagina" style="color: #FFFFFF; font-family: 'Times New Roman', Times, serif;font-size: 20px;">Pagina creada por:</p>
        <a href="http://www.lookapp.mx/"><img src="../img/lookapp.png" style="width: 150px;"/></a>
</footer>

</body>
</html>