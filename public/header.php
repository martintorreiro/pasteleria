<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/index.js"></script>
    <title>Document</title>
</head>

<?php
    include "db.php";
?>

<body>
    <header>
        <div class="header-content flex jc-sb ai-center">
            <div class="welcome">
                <p>WELCOME TO OUR ONLINE STORE!</p>
            </div>
            <div class="menu">
                <ul class="flex">
                    <li>BLOG</li>
                    <li>MY WISH LIST</li>
                    <li>SIGN IN</li>
                    <li>CREATE AN ACOUNT</li>
                </ul>
            </div>
            <div class="carrito">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>CART: 0</span>
            </div>
        </div>
        <div class="header-nav">
            <div class="logo">
                <a href="index.php"><img src="imagenes/logo.png" alt="Logo empresa"></a>
            </div>
            <div>
                <ul class="nav-categorias">
                    <?php
                        $consultaCat = "SELECT * FROM categoria";
                        $resCat = $db -> query($consultaCat);
                       
                        while($row = $resCat->fetch_assoc()){

                            $consultaSub = "SELECT * FROM subcategoria WHERE id_categoria=".$row["id"];
                           
                            $resSub = $db -> query($consultaSub);
                            $subcategorias ="";
                            if($resSub->num_rows > 0){
                                
                                $subcategorias .= "<ul class='subcategorias ocultar'>";
                                
                                while($rowSub= $resSub->fetch_assoc()){
                                    $subcategorias .= "<li><a href='categoria.php?id=".$rowSub["id"]."'>".$rowSub["nombre"]."</a></li>";
                                }
                                $subcategorias .= "</ul>";
                            }
                            echo "<li>
                                    <a href='categoria.php?cat=".$row["id"]."'>".$row["nombre"]."</a>
                                    $subcategorias
                                 </li>";
                        }
                    ?>
                </ul>
            </div>
            <div><i class="fa-solid fa-magnifying-glass"></i></div>
        </div>
    </header>