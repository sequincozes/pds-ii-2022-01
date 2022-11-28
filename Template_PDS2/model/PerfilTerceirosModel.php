<?php
    function perfilTerceiros($id){

    require_once("../iniciarSessao.php");
    require_once("ConexaoBD.php");
    

    try{

        $sql = "select * from usuario where idUsuario=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        $dados = $stmt->fetch();

        echo json_encode($dados);

    }catch(PDOException $e){

    }
}

?>