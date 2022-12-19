<?php

function buscarHistorico($id){


    require_once("../iniciarSessao.php");
    require_once("ConexaoBD.php");

    $sql = "select po.idPost, po.descricao, po.data, cur.qtdCurtidas from curtidas as cur join post as po 
    on cur.fk_Post = po.idPost join usuario as us on cur.fk_Usuario = us.idUsuario 
    where us.idUsuario =? order by cur.qtdCurtidas desc;";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    $dados = $stmt->fetchAll();

    echo json_encode($dados);

}

?>