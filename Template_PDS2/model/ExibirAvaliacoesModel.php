<?php

function ExibirAvaliacoes($idAvaliacao,$userAvaliador){

    try{

    require_once("../iniciarSessao.php");
    require_once("ConexaoBD.php");

    $sql = "select nome from usuario where idUsuario=?;";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$userAvaliador]);
    $dadosUsuario = $stmt->fetch();

    $sql2 = "select avaliacoes,data,score from avaliacoesperfilusuarios where idAvaliacoes=?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute([$idAvaliacao]);
    $dadosAvaliacao = $stmt2->fetch();

    $dados = array("user"=>$dadosUsuario,"avaliacao"=>$dadosAvaliacao);
    echo json_encode($dados);
    }
    catch(PDOException $e){

    }


}

?>