<?php

    function removerAmizade($fk_amigo1,$fk_amigo2){

        require_once("../iniciarSessao.php");
        require_once("ConexaoBD.php");

        $sql = "delete from amigos where fk_amigo1 =? and fk_amigo2 =?;";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fk_amigo1,$fk_amigo2]);

    }
?>