<?php
    include "header.php";
    include "db.php";

    $id = $_GET["id"];

    $consulta = "SELECT p.*,fp.nombre AS imagen,CONCAT(u.nombre, ' ', u.apellidos) AS autor FROM post p 
    LEFT JOIN usuario u ON u.id = p.id_usuario
    LEFT JOIN fotos_post fp ON fp.id_post = p.id WHERE p.id = $id";
    $res = $db->query($consulta);

    if($row = $res -> fetch_assoc()){
       
    
    
?>

<main>
    <div class="flex jc-start ai-center padd-12-40 font-s-12">
        <i class="fa-solid fa-house "></i>
        <span class="padd-l-10 marg-l-10 border-l-gris">POST</span>
        <span class="mayu padd-l-10 marg-l-10 border-l-gris  color-naranja"><?php echo $row["titulo"] ?></span>
    </div>

    <div class="w-1024 centrado color-negro-letra  marg-t-30 ">
        <h1 class="ta-center font-s-42 padd-0-20"><?php echo $row["titulo"] ?></h1>

        <div class="marg-t-40">
            <div class="imagen-post">
                <img src="fotos-post/<?php echo $row["imagen"] ?>" alt="imagen post">
            </div>
            <div class="texto-post">
                <?php echo $row["texto"] ?>
            </div>
            <div class="border-t-gris padd-10-0 font-s-12 marg-t-40">
                <span class="marg-r-5">BY </span>
                <span class="mayu color-naranja marg-r-5"><?php echo $row["autor"] ?></span>
                <span class="marg-r-5">-</span>
                <span class="color-naranja marg-r-5"><?php echo $row["fecha"] ?></span>
            </div>
        </div>

        <div class="marg-t-40">
            <h3 class="font-s-22 bold">Comments</h3>

            <ul class="borde-gris padd-27">

                <?php 

                    $comentarios = $db->query("SELECT * FROM comentarios_post WHERE id_post = $id");

                    while($comentario = $comentarios->fetch_assoc()){

                        echo "<li class='flex column border-b-gris padd-20-0'>
                                <div class='marg-t-10'>
                                    <p>Review by <span class='mayu bold'>".$row["nombre"]."</span>. Posted on ".$row["fecha"]."</p>
                                </div>
                                <p class='marg-t-10'>".$row["comentario"]."</p>
                            </li>";

                    }

                ?>

            </ul>
        </div>

        <div class="marg-t-20 form-com-post">
            <h3 class="color-naranja">Leave A Reply</h3>
            <p class="marg-t-10">Your email address will not be published.</p>
            <form class="marg-t-20 bold" action="">
                <div class="marg-b-28 padd-0-8 flex">
                    <label for="nombre">Name:</label>
                    <div class="control">
                        <input type="text" name="nombre" id="nombre">
                    </div>
                </div>
                <div class="marg-b-28 padd-0-8 flex">
                    <label for="email">Email:</label>
                    <div class="control">
                        <input type="email" name="email" id="email">
                    </div>
                </div>
                <div class="marg-b-28 padd-0-8 flex">
                    <label for="comentario">Comments:</label>
                    <div class="control">
                        <textarea name="comentario" id="comentario"></textarea>
                    </div>
                </div>
                <button class="padd-11-20 bg-color-naranja bold color-blanco font-s-16">POST COMMENT</button>
            </form>
        </div>
    </div>
</main>

<?php
    }
    include "footer.php";
?>