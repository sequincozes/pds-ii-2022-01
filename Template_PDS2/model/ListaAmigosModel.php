<?php

    function listarAmigos($id){

        require_once("../iniciarSessao.php");
        require_once("ConexaoBD.php");

        $sql = "select us.idUsuario,us.fotoPerfil,us.nome,us.cidade,am.dataAmizade,am.idAmigos, am.fk_amigo2,am.fk_amigo2 from amigos as
         am join usuario as us on am.fk_amigo2 = us.idUsuario where am.fk_amigo1 =?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        $dados = $stmt->fetchAll();

        echo json_encode($dados);

    }

?>