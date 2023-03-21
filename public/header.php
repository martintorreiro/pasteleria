<?php
    include "db.php";
?>
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
    <script src="js/jquery.numeric.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/index.js"></script>
    <title>Document</title>
</head>


<body>
    <header>
        <div class="header-content flex jc-sb ai-center relative">
            <div class="welcome">
                <p>WELCOME TO OUR ONLINE STORE!</p>
            </div>
            <div class="menu">
                <ul class="flex">
                    <li><a class="color-blanco hover-color-naranja" href="blog.php">BLOG</a></li>
                    <li><a class="color-blanco hover-color-naranja" href="blog.php">MY WISH LIST</a></li>
                    <li><a class="color-blanco hover-color-naranja" href="blog.php">SIGN IN</a></li>
                    <li><a class="color-blanco hover-color-naranja" href="blog.php">CREATE AN ACOUNT</a></li>
                </ul>
            </div>
            <div class="carrito pointer hover-color-negro" id="carrito">
                <div class="relative h-x-100 w-30">
                    <i
                        class="close-icon fa-solid fa-xmark absolute top-0 right-0 left-0 bot-0 flex jc-center ai-center"></i>
                    <i
                        class="open-icon fa-solid fa-cart-shopping absolute top-0 right-0 left-0 bot-0 flex jc-center ai-center"></i>
                </div>
                <span>CART : </span><span
                    id="cantidadCarrito"><?php echo isset($_SESSION['carrito'])?sizeof($_SESSION['carrito']):0 ?></span>
            </div>

            <div id="contenido-carrito" class="absolute top-50 right-0 padd-20 bg-color-blanco zindex-10 disp-none">
            </div>
        </div>
        <div class="header-nav flex jc-sb ai-center" id="header-nav">
            <div class="relative h-x-100 w-x-100 marg-l-40">
                <div id="nav-menu" class="flex show-menu ai-center absolute top-0 right-0 bot-0 left-0">
                    <div class=" logo">
                        <a href="index.php"><img src="imagenes/logo.png" alt="Logo empresa"></a>
                    </div>
                    <div class="w-x-100">

                        <ul class="nav-categorias">
                            <?php
                            $consultaCat = "SELECT * FROM categoria";
                            $resCat = $db -> query($consultaCat);
                        
                            while($row = $resCat->fetch_assoc()){

                                $consultaSub = "SELECT * FROM subcategoria WHERE id_categoria=".$row["id"];
                            
                                $resSub = $db -> query($consultaSub);
                                $subcategorias ="";
                                if($resSub->num_rows > 0){
                                    
                                    $subcategorias .= "<ul class='subcategorias ocultar borde-gris'>";
                                    
                                    while($rowSub= $resSub->fetch_assoc()){
                                        $subcategorias .= "<li class='flex ai-center marg-t-10'><a class='color-negro-letra mayu font-s-12' href='categoria.php?id=".$rowSub["id"]."'>".$rowSub["nombre"]."</a></li>";
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


                </div>
                <div id="nav-search" class="absolute flex ai-center top-0 right-0 bot-0 left-0">

                    <div class="w-x-100">
                        <form class="form-reducido relative w-x-100 borde-gris bg-color-blanco" action=""
                            id="form-search">

                            <input class="w-x-100 placeholder-negro " required name="subs" id="nav-input" type="text"
                                placeholder="Search entire store here">

                            <div class="subs-icon absolute flex color-negro ">
                                <label for="nav-input">
                                    <i class="fa-solid fa-magnifying-glass font-s-18"></i>
                                </label>
                            </div>

                            <div class=" absolute top-5 right-5 bot-5">
                                <button id="search-button"
                                    class="padd-11-20 font-s-16 bold color-blanco bg-color-naranja hover-bg-negro ">SEARCH</button>
                            </div>
                        </form>
                    </div>


                </div>
                <div class="desplegable-resultados absolute left-0 right-0 resultados-search bg-color-blanco">
                    <ul id="contenedor-resultados">

                    </ul>
                </div>

            </div>

            <div class="flex jc-center ai-center h-x-100 marg-l-10 control-search marg-r-25" id="control-search">
                <label for="toggle-search" class="relative hover-color-naranja pointer zindex-1" id="close-label">
                    <i class="fa-solid fa-magnifying-glass font-s-24 absolute top-5 left-5 mostrar-search"
                        id="search-icon"></i>
                    <i class="fa-solid fa-circle-xmark font-s-28 absolute top-5 left-5" id="close-icon"></i>
                </label>
                <input type="checkbox" check="false" id="toggle-search" class="disp-none">
            </div>

        </div>
    </header>
    <script src="js/busqueda.js"></script>