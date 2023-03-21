<?php
include "../db.php";

echo isset($_SESSION['carrito'])?sizeof($_SESSION['carrito']):0;
?>