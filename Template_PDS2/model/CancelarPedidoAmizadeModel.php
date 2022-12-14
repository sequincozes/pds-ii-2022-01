<?php

function cancelarSolicitacao($solicitado,$solicitante)
{
    require_once("ConexaoBD.php");

    $sql = "delete from convitesamizade where fk_convidado =? and fk_solicitante=?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1,$solicitado,PDO::PARAM_INT);
    $stmt->bindParam(2,$solicitante,PDO::PARAM_INT);

    $stmt->execute();

}

?>
