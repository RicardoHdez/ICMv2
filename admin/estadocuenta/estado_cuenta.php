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
<form action="transaccion.php?hipervinculo=<?php $Hipervinculo = $_GET['hipervinculo']; echo $Hipervinculo; ?>" method="POST">
    <table border="0" cellpadding="2" cellspacing="2">
        <thead>
            <th width="200px" colspan="1" rowspan="1" align="center">Plantel</th> 
            <th width="150px" colspan="1" rowspan="1" align="center">Turno</th>
            <th width="250px" colspan="1" rowspan="1" align="center">Nombre</th>
            <th width="250px" colspan="1" rowspan="1" align="center">Mes</th>
            <th width="250px" colspan="1" rowspan="1" align="center">Tipo de pago</th>
            <th width="250px" colspan="1" rowspan="1" align="center">Monto</th>
            
        </thead>

            <?php
                //Capturar el folio de los alumnos 
                $Hipervinculo = $_GET['hipervinculo'];
                //Incluir la Conexion a la base de datos
                include('../conexionBD.php');
                @mysql_query ($SQL);
                //Consula de tabla alumnos
                $consulta_alumnos = mysql_query("select * from alumnos where folio ='".$Hipervinculo."'");


                while($row = mysql_fetch_array($consulta_alumnos))
                {
                    echo "<tr>";
                    echo "<td>".$row[4]."</td>";//cada celda contiene reg, entre llaves el numero del campo
                    echo "<td>".$row[5]."</td>";
                    echo "<td>".$row['nombre']." ".$row['ap_paterno']." ".$row['ap_materno']."</td>";

                    $Folio = $row['folio'];
                ?>

                    <td><select name="caja_mes" id="caja_mes" class='form-control'>
                            <option value="ENERO">ENERO</option> 
                            <option value="FEBRERO">FEBRERO</option> 
                            <option value="MARZO">MARZO</option>
                            <option value="ABRIL">ABRIL</option> 
                            <option value="MAYO">MAYO</option>
                            <option value="JUNIO">JUNIO</option>
                            <option value="JULIO">JULIO</option>
                            <option value="AGOSTO">AGOSTO</option>
                            <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                            <option value="OCTUBRE">OCTUBRE</option>
                            <option value="NOVIEMBRE">NOVIEMBRE</option>
                            <option value="DICIEMBRE">DICIEMBRE</option> 
				        </select>
                    </td>
                    <td><select name="caja_tipodepago" id="caja_tipodepago" class='form-control'>
                            <option value="AUDITORIO">AUDITORIO</option>
                            <option value="BATA">BATA</option>
                            <option value="CAMPAMENTO">CAMPAMENTO</option>
                            <option value="CREDENCIAL">CREDENCIAL</option>
                            <option value="CUOTA">CUOTA</option>
                            <option value="CURSO">CURSO</option>
                            <option value="DOCUMENTOS">DOCUMENTOS</option>
                            <option value="INSCRIPCION">INSCRIPCION</option>
                            <option value="MANUALES">MANUALES</option> 
                            <option value="PANS">PANS</option>
                            <option value="PAQUETE">PAQUETE</option>
                            <option value="REINSCRIPCION">REINSCRIPCION</option>
                            <option value="SALIDA ESCOLAR">SALIDA ESCOLAR</option>
                            <option value="SALON">SALON</option> 
                            <option value="TALLER">TALLER</option>
				        </select></td>
                    <td>
                        <div class='form-group'>
                            <label class='sr-only' for='exampleInputAmount'>Amount (in dollars)</label>
                            <div class='input-group'><div class='input-group-addon'>$</div>
                                <input name="caja_monto" id="caja_monto" type='text' class='form-control' placeholder='Monto' required>
                            </div>
                        </div>
                    </td>
                    </tr>
                        <?php
                            echo "<tr>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "<td><a href='historial.php?hipervinculo=".$Folio."'>Historial</a></td>";
                            echo "</tr>";
                            }
                        ?>
        
            </table>
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                 </div>
                <div class="col-md-4">
                    <input type="submit" id='deuda' name='deuda' value="Debe" class="btn btn-danger btn-lg">
                    <input type="submit" id='deuda' name='deuda' value="Pago" class="btn btn-success btn-lg">
                </div>
            </div>
            </div>
    </form>
</br>
</div>
</br>
<!--Segunda tabla-->
<div class="datagrid">
    <table border="0" cellpadding="2" cellspacing="2">
        <thead>
            <th width="250px" colspan="1" rowspan="1" align="center">Ultima actializacion</th>
            <th width="200px" colspan="1" rowspan="1" align="center">Mes</th> 
            <th width="150px" colspan="1" rowspan="1" align="center">Tipo de pago</th>
            <th width="250px" colspan="1" rowspan="1" align="center">Debe</th>
            <th width="250px" colspan="1" rowspan="1" align="center">Monto</th>
            <th width="250px" colspan="1" rowspan="1" align="center">Actualizar</th>
        </thead>

            <?php
                //Capturar el folio de los alumnos 
                $Hipervinculo = $_GET['hipervinculo'];
                $linkFolio = "";
                //Incluir la Conexion a la base de datos
                include('../conexionBD.php');
                @mysql_query ($SQL);
                //Consula de tabla alumnos
                $consulta_alumnos = mysql_query("select * from pago where folio ='".$Hipervinculo."' and deuda like 'si'");

                while($row = mysql_fetch_array($consulta_alumnos))
                {
                    echo "<tr>";
                    echo "<td>".$row['fecha']."</td>";//cada celda contiene reg, entre llaves el numero del campo
                    echo "<td>".$row['mes']."</td>";
                    echo "<td>".$row['tipo_pago']."</td>";
                    echo "<td><img id='sidebe' src='../img/rojo.png' align='center' width='25px'></td>";
                    echo "<td>$ ".$row['monto']."</td>";
                    echo "<td><a href='transaccion_rapida.php?folio=".$row['folio']."&mes=".$row['mes']."&tipo_pago=".$row['tipo_pago']."&fecha=".$row['fecha']."&monto=".$row['monto']."'>Alumno ya pago</a></td>";
                    echo "</tr>";
                }
            ?>
        
            </table>
        </br>
    </div>

<!--Empieza pie de pagina-->
<footer class="footer" style="background:#04B4AE; text-align: center;">
        <p id="pagina" style="color: #FFFFFF; font-family: 'Times New Roman', Times, serif;font-size: 20px;">Pagina creada por:</p>
        <a href="http://www.lookapp.mx/"><img src="../img/lookapp.png" style="width: 150px;"/></a>
</footer>

</body>
</html>