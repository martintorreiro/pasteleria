<?php
    include "header.php";
    include "includes/estrellas.php";


    $idProd=$_GET["prod"];

    $consultaFotos = "SELECT * FROM fotos_producto WHERE id_producto=$idProd";
    $resFotos = $db->query($consultaFotos);
    
    $consultaP = "SELECT * FROM producto WHERE id=$idProd";
    $resP = $db->query($consultaP);

    $consultaCom = "SELECT * FROM comentarios_producto WHERE id_producto=$idProd";
    $resCom = $db->query($consultaCom);
    
    if($rowP = $resP->fetch_assoc()){

        $valoracion = $rowP["valoracion"];
        $nombreP= $rowP["nombre"];
        $stock = $rowP["stock"];
        $descripcionCorta = $rowP["descripcion_corta"];
        $descripcion = $rowP["descripcion"];
        $precio = $rowP["precio"];

    };
?>

<script type="text/javascript">
$(document).ready(function() {
    $('.positive-integer').numeric({
        negative: false,
        decimal: false
    });

});
</script>
<main>


    <div class="flex jc-start ai-center padd-12-40">
        <i class="fa-solid fa-house font-s-12"></i><span
            class="mayu padd-l-10 marg-l-10 border-l-gris font-s-12 color-naranja"><?php echo $nombreP ?></span>
    </div>
    <div class="w-1024 centrado padd-0-20 marg-t-20">
        <div class="w-x-100 flex">
            <div class="w-x-50 padd-27 borde-gris">
                <div class="owl-carousel pagina-producto">
                    <?php
                        while($rowFoto = $resFotos -> fetch_assoc()){
                            echo "<div class='item' data-hash='fotos-producto/".$rowFoto["nombre"]."'><img src='fotos-producto/".$rowFoto["nombre"]."'></div>";
                        };
                    ?>

                </div>
            </div>

            <div class="w-x-50 padd-27 borde-gris color-negro-letra">

                <?php
                    echo $stock>1?"<span class='font-s-12 color-verde marg-b-10'>IN STOCK</span>":"<span class='font-s-12 color-rojo marg-b-10'>OUT STOCK</span>"
                ?>

                <h2 class="mayu font-s-22 marg-b-15"><?php echo $nombreP ?></h2>

                <div class="reviews font-s-14 marg-b-15 flex ai-center">

                    <?php
                        echo pintaEstrellas(5,$valoracion);
                    ?>

                    <span><a class="color-negro-letra hover-color-naranja" href=""><?php echo $resCom->num_rows ?>
                            review</a></span>
                    <span class="marg-l-15"><a class="color-negro-letra hover-color-naranja" href="">Add Your
                            Review</a></span>
                </div>

                <p class="font-s-16 marg-b-15"><?php echo $descripcionCorta ?></p>

                <span class="font-s-32 bold color-naranja">$<?php echo $precio ?></span>

                <div class="product-add-form">
                    <form class="añadirN">
                        <div class="padd-30-0">
                            <input type="hidden" name="id_producto" value="<?php echo $idProd ?>">
                            <input type="text" name="cantidad" value="1" class="positive-integer cantidad">
                            <button
                                class='padd-11-20 marg-l-15 font-s-16 bold bg-color-naranja color-blanco hover-bg-negro'>
                                ADD TO CART
                            </button>
                        </div>
                    </form>
                </div>

                <div class=' padd-20-0'>
                    <a class="color-naranja hover-color-negro" href=""><i class='fa-solid fa-heart'></i></a>
                    <a class="color-naranja hover-color-negro" href=""><i
                            class='fa-solid fa-bars-staggered marg-l-20'></i></a>
                    <a class="color-naranja hover-color-negro" href=""><i
                            class="fa-solid fa-envelope marg-l-20"></i></a>
                </div>

                <div class="social flex">

                </div>

            </div>


        </div>
        <div class="marg-t-40 color-negro-letra">
            <nav class="flex font-s-16 padd-20-0 marg-b-20 border-b-gris color-naranja">
                <h3 class="marg-r-30 font-s-16 hover-color-negro" id="details">DETAILS</h3>
                <h3 class="marg-r-30 font-s-16 hover-color-negro" id="info">MORE INFORMATION</h3>
                <h3 class="marg-r-30 font-s-16 hover-color-negro" id="reviews">REVIEWS
                    (<?php echo $resCom->num_rows ?>)
                </h3>
            </nav>

            <div id="details-content" class=" padd-20-0">
                <?php echo $descripcion; ?>
            </div>

        </div>
    </div>

</main>

<script src="js/detalles-producto.js"></script>
<script>
$(function() {
    $("#reviews").click(function() {
        cargarReviews(<?php echo $idProd; ?>, '<?php echo $nombreP; ?>')
    });


})
</script>



<?php
   
    include "footer.php";
?>