<?php

    function recusarSolicitacao($id){

        require_once("../iniciarSessao.php");
        require_once("ConexaoBD.php");

        $sql = "delete from convitesamizade where idConviteAmizade =?;";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

    }

?>