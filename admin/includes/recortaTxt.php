<?php

    function recortaTxt($txt,$lon) {
    
        if(strlen($txt)>$lon){
            $txt = strip_tags($txt);
            $textoRecortado = substr($txt,0,$lon);
            $textoRecortado .= "...";
            return $textoRecortado;
        }else{
            return $txt;
        }
    };

?>