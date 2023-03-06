<?php
    include "header.php";
    include "db.php";

    $idCat=$_GET["cat"];

    $consultaCat = "SELECT nombre FROM categoria WHERE id=$idCat";
    $resCat = $db->query($consultaCat);
    if($nombreCat = $resCat->fetch_assoc()){
       $nombreCat= $nombreCat["nombre"];
    }

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



<main>
    <div class="flex jc-start ai-center padd-12-40">
        <i class="fa-solid fa-house font-s-12"></i><span
            class="mayu padd-l-10 marg-l-10 border-l-gris font-s-12 color-naranja"><?php echo $nombreCat ?></span>
    </div>
    <div class="flex w-1024 centrado marg-t-50 marg-b-50">
        <div class="grid-aside">
            <div class="filtro-busqueda flex column marg-b-50">
                <h3 class="marg-b-25 font-s-24 padd">SHOP BY</h3>
                <div class="borde-gris">
                    <div class="filtro-item relative">
                        <h4 class="font-s-16 bg-color-gris-claro color-negro-letra padd-9-12 flex jc-sb">SUBCATEGORIAS
                            <span><i class="fa-solid fa-angle-up"></i></span>
                        </h4>
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
                        <h4 class="font-s-16 bg-color-gris-claro padd-9-12 flex jc-sb">PACKET COUNTRY <span><i
                                    class="fa-solid fa-angle-up"></i></span></h4>
                        <ul class="padd-9-12">
                            <li class='font-s-12 color-gris-letra mayu marg-t-10 flex jc-sb '>USA<span
                                    class='color-naranja'>(5)</span></li>
                            <li class='font-s-12 color-gris-letra mayu marg-t-10 flex jc-sb '>CHINA<span
                                    class='color-naranja'>(3)</span></li>
                            <li class='font-s-12 color-gris-letra mayu marg-t-10 flex jc-sb '>ITALY<span
                                    class='color-naranja'>(6)</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid-main">
            <h2 class="mayu marg-b-40 font-s-32 color-negro-letra">
                <?php
                    echo $nombreCat
                ?>
            </h2>
            <ul class="flex wrap jc-sb ai-">

                <?php

                while($rowProd = $resProd -> fetch_assoc()){

                    $button = $rowProd["stock"]>1?"<button class='padd-9-14 bg-color-negro marg-t-10 color-blanco'>ADD TO CART</button>":
                                                    "<button class='padd-9-14 bg-color-gris marg-t-10 color-blanco'>OUT OF STOCK</button> ";

                    echo "<li class='item-producto'>
                    <div class=imagen-producto> 
                    <a href='producto.php?prod=".$rowProd["id"]."'>
                        <img src='fotos-producto/".$rowProd["imagen"]."'>
                        <span>TOP RATED</span>
                    </a>

                    </div>
                    <div class='info-producto flex column'>

                        <div class='puntuacion marg-t-10 color-naranja'>
                            <i class='fa-solid fa-star'></i>
                            <i class='fa-solid fa-star'></i>
                            <i class='fa-solid fa-star'></i>
                            <i class='fa-solid fa-star'></i>
                            <i class='fa-solid fa-star'></i>     
                        </div>
                    
                        <span class='marg-t-10'> 
                            <a class='mayu color-negro-letra' href='producto.php?prod='".$rowProd["id"]."'>".$rowProd["nombre"]." </a>
                        </span>
                        <span class='marg-t-10 color-negro-letra font-s-24 bold'>$".$rowProd["precio"]."</span>
                        <div class='flex jc-sb ai-center'>
                            <button class='padd-9-14 bg-color-negro marg-t-10 color-blanco'>ADD TO CART</button> 
                            <div class='color-naranja'>
                                <i class='fa-solid fa-heart'></i>
                                <i class='fa-solid fa-bars-staggered marg-l-15'></i>
                            </div>
                        </div>
                    </div>

                </li>";

                }

            ?>

            </ul>
        </div>
    </div>
</main>

<?php
    include "footer.php";
?>