<?php
$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once "$root/classes/Servidor.php";
require_once "$root/DAO/ServidorDAO.php";

if($_POST){
    $matricula = $_POST['matricula'];
    $servidorDAO = new ServidorDAO();

    if($servidorDAO->deletarServidor($matricula))
    {
        header("Location: ../buscar_servidores.php?resultado=true");
    }  else {
        header("Location: ../buscar_servidores.php?resultado=false");
    }
}
