<?php
    include "header.php";
    include "includes/recortaTxt.php";
?>

<main>
    <div class="slider">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <img src="imagenes/slider/slide-01.jpg" alt="">
                <div class="texto-item">
                    <div>+3(800) 2345-6789</div>
                    <div>Order Online. Hours: 8AM -11PM </div>
                    <div><a href="#">SEE ALL PRODUCTS</a></div>
                </div>
            </div>
            <div class="item">
                <img src="imagenes/slider/slide-02.jpg" alt="">
            </div>
            <div class="item">
                <img src="imagenes/slider/slide-03.jpg" alt="">
            </div>
        </div>

    </div>

    <div id="seccion-productos">

        <ul class="contenedor-categorias flex column w-1024 centrado">
            <?php

                    $consulta = "SELECT * FROM categoria";
                    $res = $db->query($consulta);
                   
                        while ($row=$res->fetch_assoc()) {
                            
                            $idCat=$row["id"];
                            $consultaProd = "SELECT p.*, f.imagen FROM producto p LEFT JOIN subcategoria s 
                            ON s.id=p.id_subcategoria LEFT JOIN categoria c ON c.id=s.id_categoria 
                            LEFT JOIN (SELECT nombre AS imagen, id_producto FROM fotos_producto 
                            GROUP BY id_producto) f ON f.id_producto = p.id WHERE c.id=$idCat
                                           ";
                            
                           
                            $resProd = $db->query($consultaProd);

                            $producto =  "<div class='owl-carousel carousel-productos listado-productos owl-theme'>";

                            while($rowProd = $resProd->fetch_assoc()){
                                    
                                  

                                $producto .= "<div class='item'>
                                <div class=imagen-producto> 
                                <a href='producto.php?prod=".$rowProd["id"]."'>
                                    <img src='fotos-producto/".$rowProd["imagen"]."'>
                                    <span>TOP RATED</span>
                                </a>

                                </div>
                                <div class='info-producto flex column'>

                                    <div class='puntuacion'>
                                        <i class='fa-solid fa-star'></i>
                                        <i class='fa-solid fa-star'></i>
                                        <i class='fa-solid fa-star'></i>
                                        <i class='fa-solid fa-star'></i>
                                        <i class='fa-solid fa-star'></i>     
                                    </div>
                                
                                    <span class='titulo'> 
                                        <a href='producto.php?prod='".$rowProd["id"]."'>".$rowProd["nombre"]." </a>
                                    </span>
                                    <span class='precio'>$".$rowProd["precio"]."</span>
                                    <div class='acciones'>
                                    
                                        <button class='añadircarrito' data-id_producto='".$rowProd["id"]."'>ADD TO CART</button>
                                         
                                        <div>
                                            <i class='fa-solid fa-heart'></i>
                                        </div>

                                    </div>
                                </div>
        
                            </div>";

                                
                                    
                            }

                            $producto .= "</div>";
    
                            echo "<li class='categoria flex row'>
                                    <div class='imagen-categoria'>
                                    <a href='categoria.php?cat=$idCat'>
                                        <img src='fotos-categoria/".$row['imagen']."' alt='imagen categoria'>
                                        <div class='categoria-info'>
                                            <h3>".$row["nombre"]."</h3>
                                           
                                            <button>SEE ALL PRODUCTS ></button>
                                        </div>
                                    </a>
                                    </div>

                                    $producto
                                </li>";
                       
                    }

                ?>
        </ul>

    </div>

    <div class="banner-content w-x-100 marg-t-40">
        <p>Hand-decorated Mouthwatering Cakes</p>
        <button>ORDER NOW</button>
    </div>

    <div id="seccion-posts" class="w-1024 centrado marg-t-40">

        <div class='owl-carousel carousel-post flex ai-stretch'>

            <?php

            $consultaPost = "SELECT p.*, f.imagen, CONCAT(u.nombre,' ',u.apellidos) AS autor FROM post p LEFT JOIN usuario u ON p.id_usuario = u.id
            LEFT JOIN (SELECT nombre AS imagen,id_post FROM fotos_post GROUP BY id_post) f 
            ON f.id_post = p.id";
    
            $resPost = $db->query($consultaPost);

            while($rowPost = $resPost->fetch_assoc()){
                $txt = recortaTxt($rowPost['texto'],145);

                echo "<div class='item'>
                        <div class='item-post padd-0-20 marg-t-20'>
                            <div class='item-post-img'>
                                <a href='noticia.php?id=".$rowPost['id']."'>
                                    <img src='fotos-post/".$rowPost['imagen']."' alt='imagen post' >
                                </a>
                            </div>
                            <div class='post-data marg-t-10 mayu'>BY <span>".$rowPost['autor']."</span> - <span>".$rowPost['fecha']."</span></div>
                            <h4 class='marg-t-10'><a href='noticia.php?id=".$rowPost['id']."'>".$rowPost['titulo']."</a></h4>
                            <p class='marg-t-10'>".$txt."</p>
                            <button class='marg-t-15'>MORE...</button>
                        </div>
                    </div>";
            }

        ?>

        </div>

    </div>

    <div class="contacto marg-t-60 marg-b-60">
        <ul class="flex jc-sb  w-1024 centrado">
            <li>
                <i class="fa-solid fa-phone"></i>
                <h5>+3(800) 2345-6789</h5>
                <p>Round-the-clock free hotline (24/7)</p>
            </li>
            <li>
                <i class="fa-solid fa-truck"></i>
                <h5>FREE SHIPPING</h5>
                <p>We provide you with fast and free delivery regardless of the product size and value.</p>
            </li>
            <li>
                <i class="fa-solid fa-thumbs-up"></i>
                <h5>SATISFACTION GUARANTEE</h5>
                <p>We are committed to your satisfaction with every order.</p>
            </li>
        </ul>
    </div>



</main>

<script src="js/carrito.js"></script>
<script>
eventosCarrito()
</script>

<?php
    include "footer.php"
?>