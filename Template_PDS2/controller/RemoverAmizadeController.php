<?php

    require_once("../iniciarSessao.php");
    require_once("../model/RemoverAmizadeModel.php");

    $fk_amigo2 = $_POST["fk_amigo2"];
    $fk_amigo1 = $_SESSION["id"];

    removerAmizade($fk_amigo1,$fk_amigo2);

?>