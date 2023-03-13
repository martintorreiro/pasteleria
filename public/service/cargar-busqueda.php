<?php

    include "../db.php";
    
    if($_GET){
        $search = $_GET["search"];

        $consulta = "SELECT * FROM producto WHERE nombre LIKE '%$search%'";
        $res = $db->query($consulta);

        $cadena = "";
        while($row = $res->fetch_assoc()){
            echo "<li></li>";
        }

        echo(json_encode($consulta)) ;

    }
    

?>