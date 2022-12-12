<?php

    function avaliar($avaliador,$avaliado,$avaliacao,$score){
        require_once("ConexaoBD.php");
        require_once("../iniciarSessao.php");

        $sql = "INSERT INTO avaliacoesperfilusuarios(avaliacoes, fk_avaliador, fk_avaliado, score) 
        VALUES(?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$avaliacao,PDO::PARAM_STR);
        $stmt->bindParam(2,$avaliador,PDO::PARAM_INT);
        $stmt->bindParam(3,$avaliado,PDO::PARAM_INT);
        $stmt->bindParam(4,$score,PDO::PARAM_INT);
        $stmt->execute();

    }

?>