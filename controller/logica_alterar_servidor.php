<?php
$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once "$root/classes/Servidor.php";
require_once "$root/DAO/ServidorDAO.php";

        $matricula = $_POST['matricula'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirmarSenha = $_POST['confirmacao'];
        $cargo = $_POST['cargo'];
        
        $servidorDAO = new ServidorDAO();
        
        $servidor = new Servidor();
        $servidor->setAdmin($admin);
        $servidor->setNome($nome);
        $servidor->setMatricula($matricula);
        $servidor->setCpf($cpf);
        $servidor->setSenha($senha);
        $servidor->setCargo($cargo);
        $servidor->setEmail($email);
        
        if($senha!=$confirmarSenha)
        {
            header("Location: ../alterar_servidores.php?resultado=erroSenha");
        }else{
            try {
               
               $resultado = $servidorDAO->alterarServidor($servidor);     
               
               if($resultado==TRUE){
                   header("Location: ../alterar_servidores.php?resultado=sucesso&matricula=$matricula");
               }
               else{
                   header("Location: ../alterar_servidores.php?resultado=erro&matricula=$matricula");
               }
            } catch (Exception $ex) {
                
                header("Location: ../cadastro_servidores.php?resultado=erro&matricula=$matricula");
            }
        }