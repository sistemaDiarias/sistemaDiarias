<?php
$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';

require_once("$root/DAO/ConexaoDAO.php");
require_once("$root/classes/Banco.php");

class BancoDAO {
    //put your code here

    function inserirBanco(Banco $banco){

        $query = "INSERT INTO banco VALUES (?,?)";
        $con = ConexaoDAO::getConexao();
        
        $id_banco = $banco->getCodigo_Banco();
        $nome = $banco->getNomeBanco();
        
        $stmt = $con->prepare($query);
        $stmt->bind_param("is", $id_banco, $nome);
        if($stmt->execute()){
            $stmt->close();
            $con->close();
            return TRUE;
        }
        $stmt->close();
        $con->close();
        return FALSE;
        
    }
    function buscarPorId($id)
    {
        $query = "select * from banco where cod_banco = ?";
        $con = ConexaoDAO::getConexao();
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id);
        $banco = new Banco();
        if($stmt->execute()){
            $result = $stmt->get_result();
            $arrayBanco = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            $con->close();            
            return $arrayBanco;
        }
        $stmt->close();
        $con->close();
        return NULL;
    }
   
    function listarTodos(){
        $query = "SELECT * FROM banco WHERE ? ORDER BY nome ASC";
        $num = 1;
        $con = ConexaoDAO::getConexao();
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $num);
        if($stmt->execute()){
            $result = $stmt->get_result();
            $arrayBanco = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            $con->close();
            return $arrayBanco;
        }
        $stmt->close();
        $con->close();
        return null;
    }
}
?>