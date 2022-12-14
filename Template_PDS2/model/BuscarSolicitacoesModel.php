<?php

function buscarSolicitacoes($idUser)
{
    require_once("ConexaoBD.php");

    $sql = "select sol.idConviteAmizade,sol.dataConvite, us.nome, us.idUsuario from convitesamizade as sol 
    INNER JOIN usuario as us on sol.fk_solicitante = us.idUsuario where sol.status = 'pendente' and sol.fk_convidado
    =?;";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$idUser]);
    $results = $stmt->fetchAll();

    echo json_encode($results);

}

?>