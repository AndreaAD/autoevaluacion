<?php
session_start();
$opcion=$_REQUEST["opcion"];
if($opcion=="pagina"){
    require_once("../Modelo/ENC_aspectos_modelo.php");
    $objAspectos=new Aspectos();
    if(isset($_SESSION["enc_idcaracteristica"])){
        $rsDatos=$objAspectos->getAspectos($_SESSION["enc_idcaracteristica"]);
    }else{
        $rsDatos=null;
    }
    require_once("../Vista/ENC_listaAspectos_vista.php");
}else{
    if($opcion=="guardarId"){
        $_SESSION["enc_idaspecto"]=$_REQUEST["id"];
        //$_SESSION["enc_idfactor"]=null;
        //$_SESSION["enc_idcaracteristica"]=null;
        //$_SESSION["enc_idaspecto"]=null;
        $_SESSION["enc_idevidencia"]=null;
    }
}
?>