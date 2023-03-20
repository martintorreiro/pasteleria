<?php
    include "header.php";
?>

<main>

    <div class="w-1024 centrado padd-0-20 marg-t-50 marg-b-50 color-negro-letra">
        <div>
            <ul class="checkout-header font-s-18 padd-8 marg-b-40 flex bold">
                <li class="active step1"> <span>01</span> SHIPPING</li>
                <li> <span>02</span> REVIEW & PAYMENTS</li>
            </ul>
        </div>

        <div class="flex">
            <div id="checkout-shipping" class="w-x-60">
                <h3 class="font-s-22 padd-b-10 marg-b-20 border-b-gris">Shipping Address</h3>
                <form enctype="multipart/form-data" id="shipping-address" class="address-form" method="post">
                    <div class="input-container required">
                        <label for="email">Email Address</label><input id="email" name="email" type="email" required>
                    </div>

                    <div class="input-container required">
                        <label for="nombre">First Name</label><input id="nombre" name="nombre" type="text" required>
                    </div>

                    <div class="input-container required">
                        <label for="apellidos">Last Name</label><input id="apellidos" name="apellidos" type="text"
                            required>
                    </div>

                    <div class="input-container">
                        <label for="compañia">Company</label><input id="compañia" name="compañia" type="text">
                    </div>

                    <div class="input-container required">
                        <label for="direccion1">Street Address</label><input id="direccion1" name="direccion1"
                            type="text" required>
                    </div>

                    <div class="input-container required">
                        <label for="ciudad">City</label><input id="ciudad" name="ciudad" type="text" required>
                    </div>

                    <div class="input-container required">
                        <label for="provincia">State/Province</label><input id="provincia" name="provincia" type="text"
                            required>
                    </div>

                    <div class="input-container required">
                        <label for="cp">Postal Code </label><input id="cp" name="cp" type="text" required>
                    </div>

                    <div class="input-container required">
                        <label for="pais">Country</label><input id="pais" name="pais" type="text" required>
                    </div>

                    <div class="input-container required">
                        <label for="telefono">Phone Number</label><input id="telefono" name="telefono" type="text"
                            required>
                    </div>

                    <div class="marg-t-40 padd-20-0">
                        <h3 class="font-s-22 padd-b-10 marg-b-20 border-b-gris">Shipping Methods </h3>
                        <div class="flex">
                            <div class="marg-l-10">
                                <label for="paypal">PayPal <i class="fa-brands fa-paypal"></i></label>
                                <input id="paypal" name="metodo" type="radio" required>
                            </div>
                            <div class="marg-l-10">
                                <label for="mastcard">Master Card <i class="fa-brands fa-cc-mastercard"></i></label>
                                <input id="mastcard" name="metodo" type="radio">
                            </div>
                        </div>
                    </div>

                    <button class="padd-20-40 bg-color-naranja bold color-blanco float-right marg-t-20 hover-bg-negro">
                        NEXT <span><i class="fa-solid fa-arrow-right"></i></span>
                    </button>


                </form>
            </div>
            <div id="checkout-review" class="w-x-60 disp-none padd-20">

                <input id="same-billing" type="checkbox" checked>
                <label for="same-billing">My billing and shipping address are the same</label>

                <div id="billing-address-details" class="address-details marg-t-20">

                </div>

                <div id="form-billing" class="disp-none">
                    <form enctype="multipart/form-data" id="billing-address" class="address-form" method=" post">
                        <div class="input-container required">
                            <label for="email">Email Address</label><input id="email" name="email" type="email"
                                required>
                        </div>

                        <div class="input-container required">
                            <label for="nombre">First Name</label><input id="nombre" name="nombre" type="text" required>
                        </div>

                        <div class="input-container required">
                            <label for="apellidos">Last Name</label><input id="apellidos" name="apellidos" type="text"
                                required>
                        </div>

                        <div class="input-container">
                            <label for="compañia">Company</label><input id="compañia" name="compañia" type="text">
                        </div>

                        <div class="input-container required">
                            <label for="direccion1">Street Address</label><input id="direccion1" name="direccion1"
                                type="text" required>
                        </div>

                        <div class="input-container required">
                            <label for="ciudad">City</label><input id="ciudad" name="ciudad" type="text" required>
                        </div>

                        <div class="input-container required">
                            <label for="provincia">State/Province</label><input id="provincia" name="provincia"
                                type="text" required>
                        </div>

                        <div class="input-container required">
                            <label for="cp">Postal Code </label><input id="cp" name="cp" type="text" required>
                        </div>

                        <div class="input-container required">
                            <label for="pais">Country</label><input id="pais" name="pais" type="text" required>
                        </div>

                        <div class="input-container required">
                            <label for="telefono">Phone Number</label><input id="telefono" name="telefono" type="text"
                                required>
                        </div>

                        <div class="flex jc-end marg-t-20">
                            <button type="button" class="bold color-negro-letra">
                                CANCEL <span><i class="fa-solid fa-arrow-right hover-color-naranja"></i></span>
                            </button>
                            <button class="padd-11-20 color-blanco bg-color-negro marg-l-10 hover-bg-naranja">
                                UPPDATE
                            </button>
                        </div>


                    </form>
                </div>

                <div class="marg-t-50 flex jc-end">
                    <button id="place-order" class="padd-20-40 bg-color-naranja bold color-blanco hover-bg-negro">
                        PLACE ORDER
                    </button>
                </div>
            </div>

            <aside class="w-x-40 padd-30">

                <?php
                        $total = 0 ;
                        $cadena = "";
                        foreach($_SESSION['carrito'] as $clave=>$valor){

                                    
                            $id_producto =  $_SESSION['carrito'][$clave]['id_producto'];
                            $cantidad = $_SESSION['carrito'][$clave]['cantidad'];
                            $res = $db->query("SELECT p.*,fp.nombre AS img FROM producto p LEFT JOIN fotos_producto fp 
                                                ON fp.id_producto = p.id WHERE p.id = $id_producto GROUP BY p.id");

                            if($row = $res->fetch_assoc()){
                                $total += $cantidad*$row["precio"];
                                $cadena .= "<li class='marg-b-40 flex'>
                                                <img class='w-70' src='fotos-producto/".$row["img"]."' alt='imagen producto'>
                                                <div class='marg-l-15'>
                                                    <p class='mayu'>".$row["nombre"]."</p>
                                                    <p>Qty: ".$cantidad."</p>
                                                    <p>$".$cantidad*$row["precio"]."</p>
                                                </div>
                                            </li>";
                            
                            }

                        }
                        
                    ?>

                <h3 class="font-s-22 padd-b-10 marg-b-20 border-b-gris">Order Summary</h3>

                <div class="flex jc-sb ai-center border-b-gris padd-20-0"><span>Order Total :</span> <span
                        class="font-s-22 bold">$<?php echo $total; ?></span></div>

                <div class="marg-t-30 border-b-gris">
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
                        <?php echo $cadena; ?>
                    </ul>
                </div>

                <div class="padd-20">

                    <h5 class='flex jc-sb ai-center'>
                        <span>SHIP TO:</span>
                        <span><i class='fa-solid fa-gear color-gris-letra hover-color-negro pointer step1'></i></span>
                    </h5>
                    <div id="shipping-address-details" class="address-details padd-10">
                    </div>
                </div>

        </div>

        </aside>
    </div>
    </div>

</main>

<script src="js/checkout.js"></script>

<?php
    include "footer.php";
?>