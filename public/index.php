<?php
    include "header.php"
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

    <div class="seccion">

        <ul class="contenedor-categorias flex column w-1024 centrado">
            <?php

                    $consulta = "SELECT * FROM categoria";
                    $res = $db->query($consulta);
                   
                        while ($row=$res->fetch_assoc()) {
                            
                            $idCat=$row["id"];
                            $consultaProd = "SELECT p.*, f.imagen FROM categoria c LEFT JOIN subcategoria s ON c.id=s.id_categoria
                                            LEFT JOIN producto p ON s.id=p.id_subcategoria
                                            LEFT JOIN (SELECT nombre AS imagen, id_producto FROM fotos_producto GROUP BY id_producto) f 
                                            ON f.id_producto = p.id  
                                            WHERE c.id=$idCat
                                           ";
    
                            $resProd = $db->query($consultaProd);

                            $producto =  "<ul class='listado-productos flex jc-sb'>";

                            while($rowProd = $resProd->fetch_assoc()){
                                    
                                  
                                    $producto .= "<li class='procucto'>
                                                    <div>
                                                    <a href='producto.php?id='".$rowProd["id"]."'>
                                                        <img src='fotos-producto/".$rowProd["imagen"]."'>
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
                                                            <a href='producto.php?id='".$rowProd["id"]."'>".$rowProd["nombre"]." </a>
                                                        </span>
                                                        <span class='precio'>$".$rowProd["precio"]."</span>
                                                        <div>
                                                            <button>ADD TO CART</button> 
                                                            <div>
                                                            <i class='fa-solid fa-heart'></i></div>

                                                        </div>
                                                    </div>
                            
                                                </li>";
                                
                                    
                            }

                            $producto .= "</ul>";
                            
    
                            echo "<li class='categoria flex row'>
                                    <div class='imagen-categoria'>
                                    <a href='categoria.php?id='".$row['imagen']."'>
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


</main>

<?php
    include "footer.php"
?>