<?php
    include "header.php";
    include "db.php";

    $idCat=$_GET["cat"];

    $consultaProd = "SELECT p.*, f.imagen FROM producto p LEFT JOIN subcategoria s 
                            ON s.id=p.id_subcategoria LEFT JOIN categoria c ON c.id=s.id_categoria 
                            LEFT JOIN (SELECT nombre AS imagen, id_producto FROM fotos_producto 
                            GROUP BY id_producto) f ON f.id_producto = p.id WHERE c.id=$idCat
                            ";
                            
    $resProd = $db->query($consultaProd);

    $consultaSub = "SELECT s.*,COUNT(p.id) AS suma_productos FROM subcategoria s LEFT JOIN producto p ON p.id_subcategoria = s.id 
                    WHERE s.id_categoria = $idCat GROUP BY s.id";
    $resSub = $db->query($consultaSub);
?>



<main class="flex w-1024 centrado" >

<div class="grid-aside">
    <div class="filtro-busqueda flex column marg-b-50">
        <h3 class="marg-b-25 font-s-24 padd" >SHOP BY</h3>
        <div class="borde-gris">
            <div class="filtro-item relative">
                <h4 class="font-s-16 bg-color-gris-claro color-negro-letra padd-9-12 flex jc-sb">SUBCATEGORIAS <span><i class="fa-solid fa-angle-up"></i></span></h4>
                <div>
                <ul class="padd-9-12">
                    <?php

                    while($rowSub = $resSub->fetch_assoc()){
                        echo "<li class='font-s-12 color-gris-letra mayu marg-t-10 flex jc-sb '>".$rowSub["nombre"]."<span class='color-naranja'>(".$rowSub["suma_productos"].")</span></li>";
                    };


                    ?>

                </ul>
                </div>
            </div>

            <div>
                <h4 class="font-s-16 bg-color-gris-claro padd-9-12 flex jc-sb">PACKET COUNTRY <span><i class="fa-solid fa-angle-up"></i></span></h4>
                <ul class="padd-9-12">
                    <li class='font-s-12 color-gris-letra mayu marg-t-10 flex jc-sb '>USA<span class='color-naranja'>(5)</span></li>
                    <li class='font-s-12 color-gris-letra mayu marg-t-10 flex jc-sb '>CHINA<span class='color-naranja'>(3)</span></li>
                    <li class='font-s-12 color-gris-letra mayu marg-t-10 flex jc-sb '>ITALY<span class='color-naranja'>(6)</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="grid-main"></div>

</main>

<?php
    include "footer.php";
?>