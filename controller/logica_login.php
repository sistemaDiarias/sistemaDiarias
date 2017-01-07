<?php
$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once "$root/DAO/ServidorDAO.php";
require_once "$root/classes/Servidor.php";

function logar($matricula, $senha){
    session_start();
    echo $matricula;
    echo $senha;
    
    $servidorDAO = new ServidorDAO();
    $servidor = $servidorDAO->buscarPorMatricula($matricula);
    if($servidor!=NULL){
        if($servidor->getSenha() == $senha){
            $_SESSION['servidor'] = $servidor;
            header("Location: ../pagina_principal.php");
        }else{
            header("Location: ../index.php?resultado=erro");
        }
    }else{
        header("Location: ../index.php?resultado=erro");
    }
} 
if (filter_has_var(INPUT_POST, 'matricula') && filter_has_var(INPUT_POST, 'senha') ){
    if(filter_input(INPUT_POST, 'matricula', FILTER_VALIDATE_INT)){
        $matricula = filter_input(INPUT_POST, 'matricula');
        $senha = filter_input(INPUT_POST, 'senha');
        logar($matricula, $senha);
    }
    else{
        header("Location: ../index.php");
    }
}
