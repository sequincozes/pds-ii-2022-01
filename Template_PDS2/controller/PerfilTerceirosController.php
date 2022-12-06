<?php

    require_once("../model/PerfilTerceirosModel.php");

    $id = $_POST["id"];
    $idUser = filter_var($id, FILTER_VALIDATE_INT, array('options' => array('min_range' => 1)));

    perfilTerceiros($idUser);


    
