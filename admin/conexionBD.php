<?php
    // Local
    $link = mysql_connect('localhost','root','');
    mysql_select_db('ICM2',$link)OR DIE('Error : en la Base de Datos');
    //Nube
    // $link = mysql_connect('mysql.hostinger.mx','u345265498_root','Lookapp');
    // mysql_select_db('u345265498_icm',$link)OR DIE('Error : en la Base de Datos');
?>