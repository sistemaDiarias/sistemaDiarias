<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjetoDAO
 *
 * @author root
 */
$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once 'classes/Projeto.php';
class ProjetoDAO {
    
    private $conexao;
    
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }
    
    function inserir(Projeto $projeto)
    {
        try {
            $query = "insert into projeto(nome) values('{$projeto->getNome()}')";

            mysqli_query($conexao, $query);
            
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    function buscarPorId($id)
    {
       $query = "select * from projeto where id = '{$id}'";

        $resultado = mysqli_query($conexao, $query);

        $projetos = array();

        while($projeto = mysqli_fetch_assoc($resultado))
        {
            array_push($projetos,$projeto);
        }

        return $projetos;
    }
    
     function buscarPorNome($nome)
    {
       $query = "select * from projeto where id = '{$nome}'";

        $resultado = mysqli_query($conexao, $query);

        $projetos = array();

        while($projeto = mysqli_fetch_assoc($resultado))
        {
            array_push($projetos,$projeto);
        }

        return $projetos;
    }
    
      function listarTodos()
    {
        $query = "select * from projeto";

        $resultado = mysqli_query($conexao, $query);

        $projetos = array();

        while($projeto = mysqli_fetch_assoc($resultado))
        {
            array_push($projetos,$projeto);
        }

        return $projetos;
    }
    
}
