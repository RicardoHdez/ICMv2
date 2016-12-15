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
    <link rel="stylesheet" href="../css/perfil.css">
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
                <li><a href="./perfil.html" style="color: #FFFFFF; font-size: 20px;">Perfil</a></li>
                <li><a href="../alumnos/alumnos.php" style="color: #FFFFFF; font-size: 20px;">Alumnos</a></li>
                <li><a href="../estadocuenta/estadocuenta.php" style="color: #FFFFFF; font-size: 20px;">Estado de cuenta</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!--Iniciar Sesion-->
                <li><a href="../../" style="color: #000000; font-size: 15px;">Cerrar sesion</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div>
    <p class="subtitulo" style="text-align: center;">Perfil del alumno</p>
</div>
<!--Termina subtitulo-->
<?php
    //Para consulta de alumno
    $Hipervinculo = $_GET['hipervinculo'];
    include('../conexionBD.php');        
    $consulta_alumno = mysql_query("select * from alumnos where folio ='".$Hipervinculo."'");
    while($row = mysql_fetch_array($consulta_alumno)){
        $Plantel = $row['escuela'];
        $Nombre = $row['nombre']." ".$row['ap_paterno']." ".$row['ap_materno'];
        $Nombres = $row['nombre'];
        $Paterno = $row['ap_paterno'];
        $Materno = $row['ap_materno'];
        $Turno = $row['turno'];
        $Casa = $row['tel_casa'];
        $Cel = $row['tel_cel'];
        $Email = $row['email'];
    }
?>  
<!--Button-->
<div class="container-fluid">
    <div class="col-md-3">
        <input class="btn btn-primary btn-lg" type="submit" value="Agregar alumno" data-toggle="modal" data-target="#agregar">
    </div>
    <div class="col-md-3">
        <form action="../estadocuenta/estado_cuenta.php?hipervinculo=<?php echo $Hipervinculo; ?>" method="post" align="right">
            <input class="btn btn-success btn-lg" type="submit" value="Agregar pago">
        </form>
    </div>
</div>
<br>
<!--End Button-->
<!--table-->
<div class="row">
<!--tabla datos personales-->
    <div class="col-md-6">
        <table class="table" id="tabla_del_alumno" align="left" border="0" cellpadding="2" cellspacing="2" width="90%">
            <tr align="center">
                <td colspan="2" id="tituloAlumno" style="font-size:150%;"><strong>Datos Personales</strong></td>
            </tr>
            <tr>
                <td style="font-size:150%;">Plantel:</td><td><input type="text" class="form-control" id="disabledInput" disabled value="<?php echo $Plantel; ?>"></td>
            </tr>
            <tr>
                <td style="font-size:150%;">Nombre:</td><td><input type="text" class="form-control" id="disabledInput" disabled value="<?php echo $Nombre; ?>"></td>
            </tr>
            <tr>
                <td style="font-size:150%;">Turno:</td><td><input type="text" class="form-control" id="disabledInput" disabled value="<?php echo $Turno; ?>"></td>
            </tr>
            <tr>
                <td style="font-size:150%;">Telefono Casa:</td><td><input type="text" class="form-control" id="disabledInput" disabled value="<?php echo $Casa; ?>"></td>
            </tr>
            <tr>
                <td style="font-size:150%;">Telefono Celular:</td><td><input type="text" class="form-control" id="disabledInput" disabled value="<?php echo $Cel; ?>"></td>
            </tr>
            <tr>
                <td style="font-size:150%;">Email:</td><td><input type="text" class="form-control" id="disabledInput" disabled value="<?php echo $Email; ?>"></td>
            </tr>
        </table>
    </div>
<!--Termina tabla datos personales-->
<!--Tabla de pago-->
    <div class="col-md-6"> 
        <table class="table table-striped" id="tabla_de_pagos" align="center" border="0" cellpadding="2" cellspacing="2" width="100%">
            <thead id="tituloPagos" style="font-size:150%;">
                <th width='20%' colspan="1" rowspan="1" align="center">Mes</th> 
                <th width='25%' colspan="1" rowspan="1" align="center">Tipo de pago</th>
                <th width='15%' colspan="1" rowspan="1" align="center">Monto</th>
                <th width='20%' colspan="1" rowspan="1" align="center">Debe</th>
            </thead>
                <?php
                    //Capturar el folio de los alumnos
                    $Hipervinculo_pago = $_GET['hipervinculo'];

                    //Incluir la Conexion a la base de datos
                    include('../ConexionBD.php');
                    
                    $resultado = mysql_query("select * from pago where folio = '".$Hipervinculo_pago."';");
                    
                    while($row = mysql_fetch_array($resultado))
                    {
                        echo "<tr>";
                        echo "<td>".$row['mes']."</td>";//cada celda contiene reg, entre llaves el numero del campo
                        echo "<td>".$row['tipo_pago']."</td>";
                        echo "<td> $ ".$row['monto']."</td>";
                        echo "<td>".$row['deuda']."</td>";
                        echo "</tr>";
                    }
                    
                ?>
        </table> 
    </div>
<!--Termina tabla de pago-->
</div>
<!--End table-->
<br>
<!--Boton editar-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <input class="btn btn-warning btn-lg btn-block" type="submit" value="Editar"  data-toggle="modal" data-target="#editar">
        </div>
    </div>
</div>
<!--Termina boton editar-->
<!--Empieza pie de pagina-->
<footer class="footer" style="background:#04B4AE; text-align: center;">
    <p id="pagina" style="color: #FFFFFF; font-family: 'Times New Roman', Times, serif;font-size: 20px;">Pagina creada por:</p>
    <a href="http://www.lookapp.mx/"><img src="../img/lookapp.png" style="width: 150px;"/></a>
</footer>
<!--Termina pagina-->
<!--Modal agregar alumno-->
<div class="modal fade" id="agregar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <!--Aqui empieza el formulario-->
        <form action="./agregar.php" method="POST">
            <table class="table" id="tabla_del_alumno" align="left" border="0" cellpadding="2" cellspacing="2" width="90%">
                <tr align="center">
                    <td colspan="2" id="tituloAlumno" style="font-size:150%;"><strong>Agregar Alumno</strong></td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Plantel:</td>
                    <td>
                        <select id='TXT_Plantel' name="TXT_Plantel" class="form-control">
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
                    </td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Nombre:</td><td><input type="text" name="TXT_Nombre" id="TXT_Nombre" maxlength="30" class="form-control" required></td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Apellido Paterno:</td><td><input type="text" name="TXT_Paterno" id="TXT_Paterno" maxlength="29" class="form-control" required></td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Apellido Materno</td><td><input type="text" name="TXT_Materno" id="TXT_Materno" maxlength="29" class="form-control" required></td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Turno:</td>
                    <td>
                        <select name="TXT_Turno" id="TXT_Turno" class="form-control">
                            <option value="8:00-11:00">8:00-11:00</option> 
                            <option value="11:00-14:00">11:00-14:00</option>
                            <option value="15:00-18:00">15:00-18:00</option>
                            <option value="Sabados">Sabados</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Telefono Casa:</td><td><input type="text" name="TXT_Casa" id="TXT_Casa" maxlength="10" class="form-control"></td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Telefono Celular:</td><td><input type="text" name="TXT_Cel" id="TXT_Cel" maxlength="13" class="form-control"></td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Email:</td><td><input type="text" name="TXT_Email" id="TXT_Email" class="form-control"></td>
                </tr>
            </table>
            <!--Aqui termina formulario-->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </div>
        </form>
    </div>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--Fin de modal agregar alumno-->
<!--Modal editar--> 
<div class="modal fade" id="editar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <!--Aqui empieza el formulario-->
        <form action="actualizar.php?hipervinculo=<?php echo $Hipervinculo; ?>" method="POST">
            <table class="table" id="tabla_del_alumno" align="left" border="0" cellpadding="2" cellspacing="2" width="90%">
                <tr align="center">
                    <td colspan="2" id="tituloAlumno" style="font-size:150%;"><strong>Datos Personales</strong></td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Plantel:</td>
                    <td>
                        <?php
                            //Para consulta de alumno
                            $Hipervinculo = $_GET['hipervinculo'];
                            include('../conexionBD.php');
                            $consulta_alumno = mysql_query("select * from alumnos where folio ='".$Hipervinculo."'");
                            while($row = mysql_fetch_array($consulta_alumno)){
                                $Plantel = $row['escuela'];
                            }
                            $ID_1 = ""; $ID_2 = ""; $ID_3 = ""; $ID_4 = ""; $ID_5 = ""; $ID_6 = ""; $ID_7 = ""; $ID_8 = "";  $ID_9 = "";
                            if($Plantel == "IZTAPALAPA CENTRO"){
                                $ID_1 = "selected";
                            }
                            if($Plantel == "METRO NATIVITAS"){
                                $ID_2 = "selected";
                            }
                            if($Plantel == "PERIFERICO IZTAPALAPA"){
                                $ID_3 = "selected";
                            }
                            if($Plantel == "TORRES EJE 6 SUR"){
                                $ID_4 = "selected";
                            }
                            if($Plantel == "PALMAS NEZA"){
                                $ID_5 = "selected";
                            }
                            if($Plantel == "QUERETARO"){
                                $ID_6 = "selected";
                            }
                            if($Plantel == "TLALTENCO"){
                                $ID_7 = "selected";
                            }
                            if($Plantel == "MANUEL CAÑAS"){
                                $ID_8 = "selected";
                            }
                            if($Plantel == "RINCONADA DE ARAGON"){
                                $ID_9 = "selected";
                            }
                        echo'<select id="TXT_Plantel" name="TXT_Plantel" class="form-control">';
                            echo'<option value="IZTAPALAPA CENTRO" '.$ID_1.'>IZTAPALAPA CENTRO</option>'; 
                            echo'<option value="METRO NATIVITAS" '.$ID_2.'>METRO NATIVITAS</option>' ;
                            echo'<option value="PERIFERICO IZTAPALAPA" '.$ID_3.'>PERIFERICO IZTAPALAPA</option>';
                            echo'<option value="TORRES EJE 6 SUR" '.$ID_4.'>TORRES EJE 6 SUR</option>'; 
                            echo'<option value="PALMAS NEZA" '.$ID_5.'>PALMAS NEZA</option>' ;
                            echo'<option value="QUERETARO" '.$ID_6.'>QUERETARO</option>' ;
                            echo'<option value="TLALTENCO" '.$ID_7.'>TLALTENCO</option>' ;
                            echo'<option value="MANUEL CAÑAS" '.$ID_8.'>MANUEL CAÑAS</option>'; 
                            echo'<option value="RINCONADA DE ARAGON" '.$ID_9.'>RINCONADA DE ARAGON</option>'; 
                        echo'</select>'
                        ?> 
                    </td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Nombre:</td><td><input type="text" name="TXT_Nombre" id="TXT_Nombre" maxlength="30" class="form-control" value="<?php echo $Nombres; ?>" required></td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Apellido Paterno:</td><td><input type="text" name="TXT_Paterno" id="TXT_Paterno" maxlength="29" class="form-control" value="<?php echo $Paterno; ?>" required></td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Apellido Materno</td><td><input type="text" name="TXT_Materno" id="TXT_Materno" maxlength="29" class="form-control" value="<?php echo $Materno; ?>" required></td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Turno:</td>
                    <td>
                        <?php
                            //Para consulta de alumno
                            $Hipervinculo = $_GET['hipervinculo'];
                            include('../conexionBD.php');
                            $consulta_alumno = mysql_query("select * from alumnos where folio ='".$Hipervinculo."'");
                            while($row = mysql_fetch_array($consulta_alumno)){
                                $Turno = $row['turno'];
                            }
                            $ID_1 = ""; $ID_2 = ""; $ID_3 = ""; $ID_4 = "";
                            if($Turno == "8:00-11:00"){
                                $ID_1 = "selected";
                            }
                            if($Turno == "11:00-14:00"){
                                $ID_2 = "selected";
                            }
                            if($Turno == "15:00-18:00"){
                                $ID_3 = "selected";
                            }
                            if($Turno == "Sabados"){
                                $ID_4 = "selected";
                            }
                        echo'<select name="TXT_Turno" id="TXT_Turno" class="form-control">';
                            echo'<option value="8:00-11:00" '.$ID_1.'>8:00-11:00</option>'; 
                            echo'<option value="11:00-14:00" '.$ID_2.'>11:00-14:00</option>';
                            echo'<option value="15:00-18:00" '.$ID_3.'>15:00-18:00</option>';
                            echo'<option value="Sabados" '.$ID_4.'>Sabados</option>';
                        echo'</select>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Telefono Casa:</td><td><input type="text" name="TXT_Casa" id="TXT_Casa" class="form-control" value="<?php echo $Casa; ?>"></td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Telefono Celular:</td><td><input type="text" class="form-control" name="TXT_Cel" id="TXT_Cel" value="<?php echo $Cel; ?>"></td>
                </tr>
                <tr>
                    <td style="font-size:150%;">Email:</td><td><input type="text" class="form-control" name="TXT_Email" id="TXT_Email" value="<?php echo $Email; ?>"></td>
                </tr>
            </table>
        <!--Aqui termina formulario-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </form>
    </div>
    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--Fin de modal editar-->
</body>
</html>