<?php
    include "header.php";
    include "db.php";
    include "includes/recortaTxt.php";

    $consulta = "SELECT * FROM post ORDER BY fecha DESC";
    $res = $db->query($consulta);
?>

<main>
    <div class="w-1024 centrado flex marg-t-40">
        <div class="w-x-25 padd-0-20">
            <div>
                <h4 class="color-negro-letra font-s-18 marg-b-40 bold-l">RECENT POSTS</h4>
                <ul class="padd-10 borde-gris">

                    <?php
if($row = $res -> fetch_assoc()){
    for ($i=0; $i < 3; $i++) { 
        echo "<li></li>";
    }
}
                    
                        
                    ?>

                </ul>
            </div>
        </div>
        <div class="w-x-75 padd-0-20"></div>

    </div>
</main>


<?php
    include "footer.php";
?>