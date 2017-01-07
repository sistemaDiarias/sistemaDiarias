<?php

$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once "$root/classes/Projeto.php";
require_once "$root/classes/Trajeto.php";
require_once "$root/classes/Relatorio.php";
require_once "$root/classes/ModalidadeTransporte.php";
require_once "$root/classes/Servidor.php";

class DiariaDAO {
    public function inserir(Diaria $diaria)
    {
        try{
            $projetoDAO = new ProjetoDAO($this->conexao);
            $projetoDAO->inserir($diaria->getProjeto());
            $diaria->setProjeto($projetoDAO->buscarPorNome($diaria->getNome()));

            $trajetoDAO = new TrajetoDAO($this->conexao);
            $trajetoDAO->inserir($diaria->getTrajeto());
            $diaria->setTrajeto($trajetoDAO->buscarPorEnderecos($diaria->getTrajeto()->getSaida(), $diaria->getTrajeto()->getChegada()));

            $modalidadeDAO = new ModalidadeTransporteDAO($this->conexao);
            $modalidadeDAO->inserir($diaria->getModalidade());
            $diaria->setModalidade($modalidadeDAO->buscarPorNome($diaria->getModalidade()->getNome()));

            $query = "insert into diaria_viagem(quant_dias,objeto_viagem,data_inicial,data_final,relato,id_projeto,id_trajeto,id_modalidade,id_servidor) values('{$diaria->getQuantidadeDiarias()}','{$diaria->getObjetivo()}','{}')";

            mysqli_query($conexao, $query);
        
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
}
