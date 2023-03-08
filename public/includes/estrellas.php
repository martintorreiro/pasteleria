<?php

    function pintaEstrellas($num,$porcentaje=100){
        
        $estrellas = "<div class='stars-container'><div class='color-gris-letra flex '>";
    
        for ($i=0; $i < $num; $i++) { 
            $estrellas .= "<i class='fa-solid fa-star'></i>";
        };

        $estrellas .= "</div><div style='width:".$porcentaje."%' class='color-naranja flex absolute'>";

        for ($i=0; $i < $num; $i++) { 
            $estrellas .= "<i class='fa-solid fa-star'></i>";
        };

        $estrellas .= "</div></div>";
        return $estrellas;
        
        }

?>