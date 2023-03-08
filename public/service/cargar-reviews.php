<?php
    include "../db.php";
    include "../includes/estrellas.php";

    $idProd = $_GET["idProd"];
    $nombreP = $_GET["nombreP"];

    $consulta = "SELECT * FROM comentarios_producto WHERE id_producto=$idProd";
    $res = $db->query($consulta);

    

 
?>

<div>
    <div>
        <h3 class="font-s-18 marg-b-15">CUSTOMER REVIEWS</h3>
        <ul class="borde-gris padd-27">
            <?php
                
                while($row = $res->fetch_assoc()){

                    echo "<li class='flex column border-b-gris padd-20-0'>
                            <span class='bold'>".$row["resumen"]."</span>
                            <div class='marg-t-10'>
                            ".pintaEstrellas(5,$row["nota_valor"]*20)."
                            </div>
                            <div class='marg-t-10'>
                            ".pintaEstrellas(5,$row["nota_calidad"]*20)."
                            </div>
                            <div class='marg-t-10'>
                            ".pintaEstrellas(5,$row["nota_precio"]*20)."
                            </div>
                            <p class='marg-t-10'>".$row["comentario"]."</p>
                            <div class='marg-t-10'><p>Review by <span class='mayu bold'>".$row["nombre"]."</span>. Posted on ".$row["fecha"]."</p></div>
                        </li>";
                }
            ?>
        </ul>
    </div>

    <div class="review-form">
        <h3 class="font-s-18 marg-b-15 mayu">YOU'RE REVIEWING: <?php echo $nombreP ?></h3>
        <form action="">
            <input type="hidden" name="id" value=<?php echo $idProd ?>>
            <div>
                <span>Your Rating</span>
                <div class="flex marg-t-20">
                    <span class=" marg-r-20">Value</span>
                    <div id="grupo-v" class="contenedor-estrellas">

                        <label data-position="1" data-grupo="v" for="v1"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>
                        <label data-position="2" data-grupo="v" for="v2"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>
                        <label data-position="3" data-grupo="v" for="v3"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>
                        <label data-position="4" data-grupo="v" for="v4"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>
                        <label data-position="5" data-grupo="v" for="v5"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>

                        <input data-grupo="v" class="estrella" type="radio" name="v" id="v1" value="1">
                        <input data-grupo="v" class="estrella" type="radio" name="v" id="v2" value="2">
                        <input data-grupo="v" class="estrella" type="radio" name="v" id="v3" value="3">
                        <input data-grupo="v" class="estrella" type="radio" name="v" id="v4" value="4">
                        <input data-grupo="v" class="estrella" type="radio" name="v" id="v5" value="5">
                    </div>

                </div>

                <div class="flex marg-t-20">
                    <span class=" marg-r-20">Quality</span>
                    <div id="grupo-q" class="contenedor-estrellas">


                        <label data-position="1" data-grupo="q" for="q1"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>
                        <label data-position="2" data-grupo="q" for="q2"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>
                        <label data-position="3" data-grupo="q" for="q3"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>
                        <label data-position="4" data-grupo="q" for="q4"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>
                        <label data-position="5" data-grupo="q" for="q5"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>

                        <input data-grupo="q" class="estrella" type="radio" name="q" id="q1" value="1">
                        <input data-grupo="q" class="estrella" type="radio" name="q" id="q2" value="2">
                        <input data-grupo="q" class="estrella" type="radio" name="q" id="q3" value="3">
                        <input data-grupo="q" class="estrella" type="radio" name="q" id="q4" value="4">
                        <input data-grupo="q" class="estrella" type="radio" name="q" id="q5" value="5">
                    </div>

                </div>

                <div class="flex marg-t-20">
                    <span class=" marg-r-20">Price</span>
                    <div id="grupo-p" class="contenedor-estrellas">


                        <label data-position="1" data-grupo="p" for="p1"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>
                        <label data-position="2" data-grupo="p" for="p2"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>
                        <label data-position="3" data-grupo="p" for="p3"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>
                        <label data-position="4" data-grupo="p" for="p4"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>
                        <label data-position="5" data-grupo="p" for="p5"><i
                                class="fa-solid fa-star color-gris-letra"></i></label>

                        <input data-grupo="p" class="estrella" type="radio" name="p" id="p1" value="1">
                        <input data-grupo="p" class="estrella" type="radio" name="p" id="p2" value="2">
                        <input data-grupo="p" class="estrella" type="radio" name="p" id="p3" value="3">
                        <input data-grupo="p" class="estrella" type="radio" name="p" id="p4" value="4">
                        <input data-grupo="p" class="estrella" type="radio" name="p" id="p5" value="5">
                    </div>

                </div>

            </div>

            <div class="marg-t-30 w-x-75">
                <label class="font-s-14" for="name">Nickname</label>
                <input type="text" id="name" name="name">
            </div>

            <div class="marg-t-30 w-x-75">
                <label class="font-s-14" for="summary">Summary</label>
                <input type="text" id="summary" name="summary">
            </div>

            <div class="marg-t-30 w-x-75">
                <label class="font-s-14" for="review">Review</label>
                <textarea name="review" id="review"></textarea>
            </div>

            <button class="padd-11-20 font-s-16 bold color-blanco bg-color-negro marg-t-30 hover-bg-naranja">SUBMIT
                REVIEW</button>
        </form>
    </div>


</div>