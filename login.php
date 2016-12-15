<?php
    //Incluir la Conexion a la base de datos
    // include('../conexionBD.php');
    //Variables    
    $User = $_POST['user'];
    $Password = $_POST['password'];

    if($User == "admin"){
        if($Password == "admin"){
            echo '<script type="text/javascript">
                    window.location.assign("./admin/");
                  </script>';
        }else{
            echo '<script type="text/javascript">
                    alert("Los datos son incorrectos");
                    window.location.assign("./");
                  </script>';
        }
    }else{
        echo '<script type="text/javascript">
              alert("Los datos son incorrectos");
              window.location.assign("./");
              </script>';
    }
?>