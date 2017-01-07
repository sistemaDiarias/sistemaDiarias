<?php
$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once "$root/classes/Servidor.php";
require_once "$root/DAO/ConexaoDAO.php";


class ServidorDAO{
        
    public function inserir_servidor(Servidor $servidor){        
        try{
            $con = ConexaoDAO::getConexao();
            $query = "INSERT INTO servidor (matricula, cpf, email, nome, senha, id_cargo, admin) VALUES (?,?,?,?,?,?,?)";
            $stmt = $con->prepare($query);
            
            
            $nome = ($servidor->getNome());
            $cpf = ($servidor->getCpf());
            $senha = ($servidor->getSenha());
            $matricula = ($servidor->getMatricula());
            $email = ($servidor->getEmail());
            $cargo = ($servidor->getCargo());
            $admin = ($servidor->getAdmin());
            $titulacao = ($servidor->getTitulacao());
                                    
            $stmt->bind_param("sssssii",$matricula,$cpf,$email,$nome,$senha,$cargo,$admin);
            if(!$stmt->execute()){
                return false;            
            }
            $stmt->close();
            $con->close();
            return true;
        } catch (Exception $e)
        {
            echo $e->getMessage();
            return false;
        }
            
            
    }
    public function alterarServidor(Servidor $servidor){        
        try{
            $con = ConexaoDAO::getConexao();
            $query = "UPDATE servidor SET cpf='{$servidor->getCpf()}',email = '{$servidor->getEmail()}',nome = '{$servidor->getNome()}',senha = '{$servidor->getSenha()}', id_cargo = '{$servidor->getCargo()}' WHERE matricula = '{$servidor->getMatricula()}'";
            var_dump($query);
            $resultado = $con->query($query);                        
            if(!$resultado){
                
                return false;            
            }
            
            $con->close();
            return true;
        } catch (Exception $e)
        {
            echo $e->getMessage();
            return false;
        }
            
            
    }
    public function buscarPorMatricula($matricula)
    {
        $query = "SELECT * FROM servidor WHERE matricula = '{$matricula}'";
        $con = ConexaoDAO::getConexao();
        $servidor = new Servidor();
        
        $resultado = $con->query($query);
        $arrayServidores = $resultado->fetch_all(MYSQLI_ASSOC);
        $con->close();
        if(count($arrayServidores)==0){
            return NULL;
        }else{
            $servidor->setAdmin($arrayServidores[0]['admin']);
            $servidor->setCargo($arrayServidores[0]['id_cargo']);
            $servidor->setCpf($arrayServidores[0]['cpf']);
            $servidor->setEmail($arrayServidores[0]['email']);
            $servidor->setMatricula($arrayServidores[0]['matricula']);
            $servidor->setNome($arrayServidores[0]['nome']);
            $servidor->setSenha($arrayServidores[0]['senha']);
            $servidor->setTitulacao($arrayServidores[0]['id_titulacao']);
            return $servidor;
        }
    }
    
    public function buscaPorMatriculaOuNome($matricula,$nome)
    {
        $query = "SELECT * FROM servidor WHERE matricula = '{$matricula}' OR nome LIKE '%{$nome}%' ORDER BY nome ASC";
        $dao = new ConexaoDAO();
        $conexao = $dao->getConexao();
        
        $resultado = $conexao->query($query);
        $arrayServidores = $resultado->fetch_all(MYSQLI_ASSOC);
        $conexao->close();
        if(count($arrayServidores)==0){
            return NULL;
        }
     
        return $arrayServidores;
    }
    
    public function deletarServidor($matricula)
    {
        try {
            $query = "DELETE FROM servidor WHERE matricula = '{$matricula}'";
            $con = ConexaoDAO::getConexao();        
            $resultado = $con->query($query);
            $con->close();
            if($resultado==TRUE){
                return TRUE;
            }
            return FALSE;
        } catch (Exception $ex) {
            return FALSE;
        }
        
    }
    
    public function listarTodos(){
        $query = "SELECT * FROM servidor ORDER BY nome ASC";
        $con = ConexaoDAO::getConexao();
        
        $resultado = $con->query($query);
        $arrayServidores = $resultado->fetch_all(MYSQLI_ASSOC);
        $con->close();
        if(count($arrayServidores)==0){
            return NULL;
        }
        
        return $arrayServidores;
    }
}
