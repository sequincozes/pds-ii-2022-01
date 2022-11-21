<?php

    header('Content-Type: application/json; charset=utf-8');
    require_once("../model/EditarImagemPerfilController.php");

    $urlImage = $_POST["url"];
    
    salvarImagem($urlImage);

?>