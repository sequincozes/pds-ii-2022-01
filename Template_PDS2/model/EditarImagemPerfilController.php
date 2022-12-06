<?php

    function salvarImagem($url){

        require_once("../iniciarSessao.php");
        require_once("ConexaoBD.php");

        $idUser = $_SESSION["id"];

        $sql = "UPDATE usuario set fotoPerfil =? where idUsuario =?;";
        $stm = $conn->prepare($sql);
        $urlT = strval($url);
        $stm->execute([$urlT,$idUser]); 
        $_SESSION["fotoPerfil"] = $urlT;

        echo json_encode($urlT);
        
    }

?>