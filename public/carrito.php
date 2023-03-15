<?php
    include "header.php";
?>

<main>
    <h1 class="w-1024 centrado ta-center font-s-42">SHOPPING CART</h1>

    <div class="w-1024 centrado flex marg-t-50">
        <div class="w-x-70 padd-0-20">
            <table class="w-x-100">
                <tr>
                    <th class="padd-10">Item</th>
                    <th class="padd-10">Price</th>
                    <th class="padd-10">Qty</th>
                    <th class="padd-10">Subtotal</th>
                </tr>
                <tbody id="tabla-carrito">

                </tbody>


            </table>
        </div>
        <div class="w-x-30 padd-0-20">
            <h3 class="font-s-22">Summary</h3>
            <div></div>
        </div>
    </div>


</main>



<?php
    include "footer.php";
?>