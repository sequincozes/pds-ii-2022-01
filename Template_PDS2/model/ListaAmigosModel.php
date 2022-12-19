<?php

    function listarAmigos($id){

        require_once("../iniciarSessao.php");
        require_once("ConexaoBD.php");

        $sql = "select am.fk_amigo2,us.idUsuario,us.fotoPerfil,us.nome,us.cidade,am.dataAmizade,am.idAmigos, am.fk_amigo2,am.fk_amigo2 from amigos as
         am join usuario as us on am.fk_amigo2 = us.idUsuario where am.fk_amigo1 =?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        $dados = $stmt->fetchAll();

        $sql2 = "select am.fk_amigo1,us.idUsuario,us.fotoPerfil,us.nome,us.cidade,am.dataAmizade,am.idAmigos, am.fk_amigo1,am.fk_amigo1 from amigos as
        am join usuario as us on am.fk_amigo1 = us.idUsuario where am.fk_amigo2 =?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute([$id]);

        $dados2 = $stmt2->fetchAll();

        $geral = array("direita"=>$dados2,"esquerda"=>$dados);

        echo json_encode($geral);

    }

?>