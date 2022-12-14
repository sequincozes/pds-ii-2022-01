<?php

function adicionarAmizade($solicitante,$solicitado,$idSolicitacao)
{
    require_once("ConexaoBD.php");

    $sql = "delete from convitesamizade where idConviteAmizade =?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$idSolicitacao]);

    $sql2 = "insert into ";


}

?>