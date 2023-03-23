<?php
include "header.php";
?>

<main>
    <div class="w-1024 centrado color-negro-letra marg-t-40">
        <h1 class="font-s-42 ta-center marg-b-40">CREATE NEW CUSTOMER ACCOUNT</h1>
        <div class="padd-20">
            <form enctype="multipart/form-data" id="create-acount" class="address-form w-600 centrado" method="post">

                <div class="marg-b-20">

                    <h4 class="ta-center marg-b-20">Personal Information</h4>

                    <div class="input-container required">
                        <label for="nombre">First Name</label><input id="nombre" name="nombre" type="text" required>
                    </div>

                    <div class="input-container required">
                        <label for="apellidos">Last Name</label><input id="apellidos" name="apellidos" type="text"
                            required>
                    </div>

                </div>

                <div class="marg-b-20">

                    <h4 class="ta-center marg-b-20">Sign-in Information</h4>

                    <div class="input-container required">
                        <label for="email">Email Address</label><input id="email" name="email" type="email" required>
                    </div>

                    <div class="input-container required">
                        <label for="password">Password</label><input id="password" name="password" type="password"
                            required>
                    </div>

                    <div class="input-container required">
                        <label for="cpassword">Confirm Password</label><input id="cpassword" name="cpassword"
                            type="password" required>
                    </div>

                </div>



                <div class="flex jc-center marg-t-20">
                    <button type="button" class="bold color-negro-letra hover-color-naranja">
                        BACK
                    </button>
                    <button class="padd-11-20 color-blanco bg-color-naranja marg-l-10 hover-bg-negro">
                        CREATE AN ACOUNT
                    </button>
                </div>


            </form>
        </div>
    </div>
</main>
<script>
crearCuenta()
</script>

<?php
include "footer.php";
?>