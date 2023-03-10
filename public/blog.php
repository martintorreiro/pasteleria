<?php
    include "header.php";
    include "db.php";
    include "includes/recortaTxt.php";


//--------------aside
    $ultimosPost = "SELECT * FROM post ORDER BY fecha DESC LIMIT 3";
    $resUltimosPost = $db->query($ultimosPost);

    $ultimosComentarios = "SELECT cp.*, p.titulo  FROM comentarios_post cp LEFT JOIN post p ON p.id = cp.id_post ORDER BY fecha DESC LIMIT 3";
    $resUltimosComentarios = $db->query($ultimosComentarios);

//---------------main



if(isset($_POST["sort"])){
    $posts = "SELECT p.*, f.imagen, CONCAT(u.nombre,' ',u.apellidos) AS autor FROM post p LEFT JOIN usuario u ON p.id_usuario = u.id
    LEFT JOIN (SELECT nombre AS imagen,id_post FROM fotos_post GROUP BY id_post) f 
    ON f.id_post = p.id ORDER BY ".$_POST["sort"]." ";
}else{
    $posts = "SELECT p.*, f.imagen, CONCAT(u.nombre,' ',u.apellidos) AS autor FROM post p LEFT JOIN usuario u ON p.id_usuario = u.id
    LEFT JOIN (SELECT nombre AS imagen,id_post FROM fotos_post GROUP BY id_post) f 
    ON f.id_post = p.id ORDER BY fecha ";
}

if(isset($_POST["order"])){
    $posts.= "DESC ";
}

//----------paginacion

$itemsXPag= 3;
$paginaActual = 1;
$indice = $paginaActual-1;



if(isset($_POST["show"])){
    echo $_POST["show"];
    $itemsXPag = $_POST["show"];
}

if(isset($_GET["pag"])){
    $paginaActual = $_GET["pag"];
    $indice = ($_GET["pag"]-1)*$itemsXPag;
}

$posts .= "LIMIT ".$indice.",".$itemsXPag;
$resPosts = $db->query($posts);

$totalPosts = $db->query("SELECT * FROM post");



$numeroPaginas = ceil(($totalPosts->num_rows)/$itemsXPag);


?>

<main>
    <div class="w-1024 centrado flex marg-t-40">
        <div class="w-x-25 padd-0-20 ">
            <div class="marg-b-50">
                <h4 class="color-negro-letra font-s-18 marg-b-40 bold-l">RECENT POSTS</h4>
                <ul class="padd-10 borde-gris  ultimos-post">

                    <?php

                    while($row = $resUltimosPost -> fetch_assoc()){ 
                            echo "<li class='padd-b-15 marg-b-15 border-b-gris '>
                            <a class='hover-color-naranja color-negro-letra font-s-12' href='noticia.php?noticia=".$row["id"]."'>".recortaTxt($row["titulo"],40)."</a>
                            </li>";      
                    }
                      
                    ?>

                </ul>
            </div>

            <div class="marg-b-50">
                <h4 class="color-negro-letra font-s-18 marg-b-40 bold-l">RECENT COMMENTS</h4>
                <ul class="padd-10 borde-gris  ultimos-post">

                    <?php

                    while($row = $resUltimosComentarios -> fetch_assoc()){ 
                            echo "<li class='padd-b-15 marg-b-15 border-b-gris '>
                            <span>".$row["nombre"]."</span> on
                            <a class='hover-color-naranja color-negro-letra font-s-12 marg-b-10' href='noticia.php?noticia=".$row["id"]."'>".recortaTxt($row["titulo"],40)."</a>
                            <p>".recortaTxt($row["comentario"],40)."</p>
                            </li>";
                    }
                      
                    ?>

                </ul>
            </div>

        </div>
        <div class="w-x-75 padd-0-20">
            <h2 class="font-s-32 color-negro ta-center">BLOG</h2>

            <div class="flex jc-sb ai-center font-s-14">


                <div class="flex ai-center">
                    <span class='padd-20 bold'>Sort By</span>
                    <form id="form-sort" action="blog.php" method="post">
                        <select name="sort" class="blog-select" id="select-sort" onChange='this.form.submit()'>
                            <option value="titulo"
                                <?php echo (isset($_POST["sort"])&&$_POST["sort"]=="titulo")? "selected": "" ?>>
                                Title
                            </option>
                            <option value="autor"
                                <?php echo (isset($_POST["sort"])&&$_POST["sort"]=="autor")? "selected": "" ?>>
                                Author
                            </option>
                            <option value="fecha"
                                <?php echo (isset($_POST["sort"])&&$_POST["sort"]=="fecha")? "selected": "" ?>
                                <?php echo isset($_POST["sort"])? "": "selected" ?>>Date
                            </option>
                        </select>

                        <span class="padd-20 marg-l-10">
                            <label for="order" <?php echo isset($_POST["order"])?"class='girar180 disp-inblock'":"" ?>>
                                <i class="pointer fa-solid fa-arrow-down-short-wide color-gris-letra"></i>
                            </label>

                            <input class="disp-none" id="order" name="order" type="checkbox"
                                onChange='this.form.submit()' <?php echo isset($_POST["order"])?"checked":"" ?>>

                        </span>
                </div>

                <span>

                    <label class='padd-20 bold'>Show</label>
                    <select name="show" class="blog-select" id="select-pages" onChange='this.form.submit()'>

                        <option value="3" selected
                            <?php echo (isset($_POST["show"])&&$_POST["show"]=="3")? "selected": "" ?>
                            <?php echo isset($_POST["sort"])? "": "selected" ?>>3</option>
                        <option value="6" <?php echo (isset($_POST["show"])&&$_POST["show"]=="6")? "selected": "" ?>>6
                        </option>
                        <option value="9" <?php echo (isset($_POST["show"])&&$_POST["show"]=="9")? "selected": "" ?>>9
                        </option>
                    </select>

                </span>
                </form>



            </div>

            <div>

                <ul class="marg-t-30 flex wrap">

                    <?php

                    while($row = $resPosts -> fetch_assoc()){ 
                            echo " <li class='item-post padd-0-20 marg-b-30 w-x-50'>
                            <div class='item-post-img'>
                                <a href='noticia.php?id=".$row['id']."'>
                                    <img src='fotos-post/".$row['imagen']."' alt='imagen post' >
                                </a>
                            </div>
                            <div class='post-data marg-t-10 mayu'>BY <span>".$row['autor']."</span> - <span>".$row['fecha']."</span></div>
                            <h4 class='marg-t-10'><a href='noticia.php?id=".$row['id']."'>".$row['titulo']."</a></h4>
                            <p class='marg-t-10'>".recortaTxt($row["texto"],140)."</p>
                            <button class='marg-t-15'>MORE...</button>
                        </li>";    
                    }
  
                    ?>

                </ul>

                <div class="control-pagina  flex ai-center">


                    <?php

                        if($paginaActual>1){
                            
                            echo "<div class='padd-10'>
                            <a href='blog.php?pag=".($paginaActual-1)."' class='color-naranja hover-color-negro bold'>PREV</a>
                            </div>";
                        
                        }
                     
                    ?>

                    <ul class="flex">
                        <?php

                            if($numeroPaginas>1){
                            for ($i=1; $i <= $numeroPaginas ; $i++) {
                                
                                if($i==$paginaActual){
                                    echo "<li class='padd-10 bold'>".$i."</li>";
                                }else{
                                    echo "<li class='padd-10'><a class='color-negro-letra bold ' href='blog.php?pag=".$i."'>".$i."</a></li>";
                                }
                                
                            }
                            }
                        ?>
                    </ul>

                    <?php
                    
                        if($paginaActual<$numeroPaginas){

                            echo "<div class='padd-10'>
                                    <a href='blog.php?pag=".($paginaActual+1)."'
                                    class='color-naranja hover-color-negro bold '>NEXT</a>
                                </div>";
                        }

                    ?>

                </div>
            </div>
        </div>

    </div>
</main>


<?php
    include "footer.php";
?>