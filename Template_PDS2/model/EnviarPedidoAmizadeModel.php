<?php

    function enviarPedidoAmizade($usuarioSolicitado,$usuarioSolicitante){

        require_once("../iniciarSessao.php");
        require_once("ConexaoBD.php");
        require_once("../model/EnviarPedidoAmizadeModel.php");

        $sql = "insert into convitesamizade(fk_convidado,fk_solicitante) values(?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$usuarioSolicitado,$usuarioSolicitante]);

    }

?>