<?php
    function perfilTerceiros($id){

    require_once("../iniciarSessao.php");
    require_once("ConexaoBD.php");
    
    try{

        $sql = "select * from usuario where idUsuario=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        $dados = $stmt->fetch();

        $sql2 = "select inst.nome, vinc.cargo from instituicao as inst 
        inner join vinculosusuario as vinc on inst.idInstituicao = vinc.fk_Vinculo WHERE vinc.fk_Usuario =?;";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute([$id]);
        $instituicao = $stmt2->fetch();

        $sql3 = "select us.nome, av.avaliacoes, av.score, av.idAvaliacoes, av.fk_avaliador from avaliacoesperfilusuarios as av 
        inner join usuario as us on av.fk_avaliador = us.idUsuario where av.fk_avaliado =?;";

        $stmt3 = $conn->prepare($sql3);
        $stmt3->execute([$id]);
        $avaliacoes = $stmt3->fetchAll();

        $d1 = new DateTime('now');
        $d2 = new DateTime('2001-06-16');
        $intervalo = $d1->diff( $d2 );
        $int = $intervalo->y;


        $val = array("user"=>$dados,"inst"=>$instituicao,"avaliacoes"=>$avaliacoes,"dataN"=>$int);
        echo json_encode($val);

    }catch(PDOException $e){

    }
}

?>