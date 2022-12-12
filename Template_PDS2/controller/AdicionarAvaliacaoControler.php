<?php 

    require_once("../iniciarSessao.php");
    require_once("../model/AdicionarAvaliacaoModel.php");  
    
    $avaliado = $_POST["avaliado"];
    $avaliacao = $_POST["avaliacao"];
    $score = $_POST["score"];
    $avaliador = $_SESSION["id"];

    avaliar($avaliador,$avaliado,$avaliacao,$score);


?>