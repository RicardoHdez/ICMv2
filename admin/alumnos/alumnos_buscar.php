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
                <li><a href="./alumnos.php" style="color: #FFFFFF; font-size: 20px;">Alumnos</a></li>
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
    <p class="subtitulo" style="text-align: center;">Alumnos</p>
</div>
<!--Termina subtitulo-->


<div class="datagrid">
<table align="center" border="0" cellpadding="2" cellspacing="2" width='100%'>
    <thead>
        <form accept-charset="utf-8" method="POST" action="alumnos_buscar.php">
        <th width='20%' colspan="1" rowspan="1" align="center">
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
        <th width='25%' colspan="1" rowspan="1" align="center">
                    <label class="sr-only" for="exampleInputAmount">Nombre</label>
                    <div class="input-group">
                    <input type="text" class="form-control" name="B_Nombre" id="B_Nombre" value="" placeholder="Nombre">
                    </div>
                <button type="submit" class="btn btn-default btn-sm" style="color:#000000;">Buscar</button>
        </th>
        <th width='15%' colspan="1" rowspan="1" align="center">
            <select name="Deuda" id="Deuda" class="form-control">
				<option value="Deuda">Deuda</option> 
				<option value="SI">Si</option> 
				<option value="NO">No</option>
			</select>
            <button type="submit" class="btn btn-default btn-sm" style="color:#000000;">Buscar</button>
        </form>
        <th width='20%' colspan="1" rowspan="1" align="center">Telefono</th>
        <th width='20%' colspan="1" rowspan="1" align="center">Email</th>
    </thead>

       <?php
            //Incluir la Conexion a la base de datos
            include('../ConexionBD.php');
            @mysql_query ($SQL);
            //Variables necesarias para buscar
            $Buscar = $_POST['B_Nombre'];
            $Planteles = $_POST['Seleccion_Plantel'];
            $Debe = $_POST['Deuda'];
            
            if(!$Buscar){ //Condicion: si la variable Buscar se encuentra vacia
                if($Planteles == "PLANTEL"){ //Condicion: si se seleccionan todos
                    if($Debe == "SI"){$resultado = mysql_query("select * from alumnos where adeudo = 'SI'");}
                    if($Debe == "NO"){$resultado = mysql_query("select * from alumnos where adeudo = 'NO'");}
                    if($Debe == "Deuda"){$resultado = mysql_query("select * from alumnos");}
                    //$resultado = mysql_query("select * from alumnos");
                }else{
                    if($Debe == "SI"){$resultado = mysql_query("select * from alumnos where escuela='".$Planteles."' and adeudo = 'SI'");}
                    if($Debe == "NO"){$resultado = mysql_query("select * from alumnos where escuela='".$Planteles."' and adeudo = 'NO'");}
                    if($Debe == "Deuda"){$resultado = mysql_query("select * from alumnos where escuela='".$Planteles."'");}
                }

            }else{ //Caso contrario de que la variable Buscar contenga algo
                if($Planteles == "PLANTEL"){
                    if($Debe == "SI"){$resultado = mysql_query("select * from alumnos where nom_completo like '%".$Buscar."%' and adeudo = 'SI'");}
                    if($Debe == "NO"){$resultado = mysql_query("select * from alumnos where nom_completo like '%".$Buscar."%' and adeudo = 'NO'");}
                    if($Debe == "Deuda"){$resultado = mysql_query("select * from alumnos where nom_completo like '%".$Buscar."%'");}
                }else{
                    if($Debe == "SI"){$resultado = mysql_query("select * from alumnos where escuela like '".$Planteles."' and nom_completo like '%".$Buscar."%' and adeudo = 'SI'");}
                    if($Debe == "NO"){$resultado = mysql_query("select * from alumnos where escuela like '".$Planteles."' and nom_completo like '%".$Buscar."%' and adeudo = 'NO'");}
                    if($Debe == "Deuda"){$resultado = mysql_query("select * from alumnos where escuela like '".$Planteles."' and nom_completo like '%".$Buscar."%'");}
                }
            }



            while($row = mysql_fetch_array($resultado))
            {
                    if($row['adeudo'] == "SI"){
                        $ConsultaDeuda = "<img id='sidebe' src='../img/rojo.png' align='center' width='25px'>";
                        //$ConsultaDeuda = "SI";
                        $Contador = "";
                    }else{
                        $ConsultaDeuda = "<img id='nodebe' src='../img/verde.png' align='center' width='25px'>";
                        //$ConsultaDeuda = "NO";
                        $Contador = "";
                    }
                // Empieza la Tabla
                echo "<tr>";
                echo "<td>".$row['escuela']."</td>";//cada celda contiene reg, entre llaves el numero del campo
                echo "<td><a href='../perfil/perfil_alumno.php?hipervinculo=".$row['folio']."'>".$row['nom_completo']."</a></td>";
                // echo "<td><a href='perfil_alumno.php?hipervinculo=".$row['folio']."'>".$row['nombre']." ".$row['ap_paterno']." ".$row['ap_materno']."</a></td>";
                echo "<td>".$ConsultaDeuda."</td>";
                echo "<td>".$row['tel_casa']." / ".$row['tel_cel']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";

            }
        //echo "</table>";//FINALIZA LA TABLA

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