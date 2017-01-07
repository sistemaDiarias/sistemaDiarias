<?php

$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once "$root/classes/PerfilDiaria.php";
require_once "$root/DAO/PerfilDiariaDAO.php";
require_once "$root/DAO/CargoDAO.php";
require_once "$root/classes/Cargo.php";


if($_POST)
{
    $classe = $_POST['classe'];
    $regiaoA = $_POST['regiaoA'];
    $regiaoB = $_POST['regiaoB'];
    $regiaoC = $_POST['regiaoC'];
    $regiaoD = $_POST['regiaoD'];
    $noEstado = $_POST['regiaoE'];
    $foraEstado = $_POST['regiaoF'];
    $nomeCargo = $_POST['nomeCargo'];
    
    
    try {
              
    $perfilDiaria = new PerfilDiaria();
    $perfilDiaria->setNome($classe);
    $perfilDiaria->setValorRegiaoA($classe);
    $perfilDiaria->setValorRegiaoB($classe);
    $perfilDiaria->setValorRegiaoC($classe);
    $perfilDiaria->setValorRegiaoD($classe);
    $perfilDiaria->setValorNoEstado($classe);
    $perfilDiaria->setValorForaEstado($classe);
    
    $perfilDAO = new PerfilDiariaDAO();
    $perfilDAO->inserir($perfilDiaria);
    $perfilDiaria= $perfilDAO->buscarPorNome($perfilDiaria->getNome());
    $cargo = new Cargo();
    $cargo->setNome($nomeCargo);
    $cargo->setPerfilDiaria($perfilDiaria);
    $cargoDAO = new CargoDAO();
    $resultado=$cargoDAO->inserir($cargo);    
    
               if($resultado==TRUE){
                   header("Location: ../cadastro_perfil_de_diaria.php?resultado=sucesso");
               }
               else{
                   header("Location: ../cadastro_perfil_de_diaria.php?resultado=erro");
               }
            } catch (Exception $ex) {
                
                header("Location: ../cadastro_perfil_de_diaria.php?resultado=erro");
            }
    
}