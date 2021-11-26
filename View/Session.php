<?php
session_start();
if($_SESSION['logged'] == true){
        include_once "tela_escola_principal.php"; 
}
else{
        include_once "../404.php";
}
?>