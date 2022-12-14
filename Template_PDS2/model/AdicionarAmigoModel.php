<?php

function adicionarAmizade($solicitante,$solicitado,$idSolicitacao)
{
    require_once("ConexaoBD.php");

    $sql = "delete from convitesamizade where idConviteAmizade =?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$idSolicitacao]);

    $sql2 = "INSERT INTO amigos(fk_amigo1, fk_amigo2) VALUES (?,?)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bindParam(1,$solicitado,PDO::PARAM_INT);
    $stmt2->bindParam(2,$solicitante,PDO::PARAM_INT);

    $stmt2->execute();


}

?>