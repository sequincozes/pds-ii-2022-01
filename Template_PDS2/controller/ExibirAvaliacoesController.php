<?php

    require_once("../model/ExibirAvaliacoesModel.php");

    $idAvaliacao = $_POST["idAvaliacao"];
    $userAvaliador = $_POST["avaliador"];
   
    ExibirAvaliacoes($idAvaliacao,$userAvaliador);
?>