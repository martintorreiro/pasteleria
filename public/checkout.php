<?php
    include "header.php";
?>

<main>

    <div class="w-1024 centrado padd-0-20 marg-t-50 color-negro-letra">
        <div>
            <ul class="checkout-header font-s-18 padd-8 marg-b-40 flex bold">
                <li class="active"> <span>01</span> SHIPPING</li>
                <li> <span>02</span> REVIEW & PAYMENTS</li>
            </ul>
        </div>

        <div class="flex">
            <div class="w-x-60">
                <h3 class="font-s-22 padd-b-10 marg-b-20 border-b-gris">Shiping Address</h3>
                <form action="" id="checkout-form">
                    <div class="input-container required">
                        <label for="email">Email Address</label><input id="email" name="email" type="email">
                    </div>

                    <div class="input-container required">
                        <label for="nombre">First Name</label><input id="nombre" name="nombre" type="text">
                    </div>

                    <div class="input-container required">
                        <label for="apellidos">Last Name</label><input id="apellidos" name="apellidos" type="text">
                    </div>

                    <div class="input-container">
                        <label for="compañia">Company</label><input id="compañia" name="compañia" type="text">
                    </div>

                    <div class="input-container required">
                        <label for="direccion1">Street Address</label><input id="direccion1" name="direccion1"
                            type="text">
                    </div>

                    <div class="input-container required">
                        <label for="ciudad">City</label><input id="ciudad" name="ciudad" type="text">
                    </div>

                    <div class="input-container required">
                        <label for="provincia">State/Province</label><input id="provincia" name="provincia" type="text">
                    </div>

                    <div class="input-container required">
                        <label for="cp">Zip/Postal Code </label><input id="cp" name="cp" type="text">
                    </div>

                    <div class="input-container required">
                        <label for="pais">Country</label><input id="pais" name="pais" type="text">
                    </div>

                    <div class="input-container required">
                        <label for="telefono">Phone Number</label><input id="telefono" name="telefono" type="text">
                    </div>

                </form>
            </div>

            <aside class="w-x-40 padd-30">

                <h3 class="font-s-22 padd-b-10 marg-b-20 border-b-gris">Order Summary</h3>
                <div class="marg-t-30">
                    <h5 class="flex jc-sb padd-10-0">
                        <div>
                            <span class="color-naranja">
                                <?php echo isset($_SESSION["carrito"])?count($_SESSION["carrito"]):"0" ?>
                            </span>
                            Items in Cart
                        </div>
                        <span><i class="fa-solid fa-angle-up"></i></span>
                    </h5>
                    <ul>
                        <?php
                        $cadena = "";
                        foreach($_SESSION['carrito'] as $clave=>$valor){

                                    
                            $id_producto =  $_SESSION['carrito'][$clave]['id_producto'];
                            $cantidad = $_SESSION['carrito'][$clave]['cantidad'];
                            $res = $db->query("SELECT p.*,fp.nombre AS img FROM producto p LEFT JOIN fotos_producto fp 
                                                ON fp.id_producto = p.id WHERE p.id = $id_producto GROUP BY p.id");

                            if($row = $res->fetch_assoc()){
                                
                                $cadena .= "<li class='marg-b-40'>
                                                <img class='w-70' src='fotos-producto/".$row["img"]."' alt='imagen producto'>
                                            </li>";
                            
                            }

                        }
                        echo $cadena;
                        ?>
                    </ul>
                </div>

            </aside>
        </div>
    </div>

</main>

<?php
    include "footer.php";
?>