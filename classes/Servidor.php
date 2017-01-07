<?php
    $root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
    require_once("$root/classes/Cargo.php");
    require_once("$root/classes/Diaria.php");
/**
 * Description of Servidor
 *
 * @author kenad
 */
class Servidor
{
    private $matricula;
    private $cpf;
    private $nome;
    private $email;
    private $cargo;
    private $senha;
    private $diariasSolicitadas = array();
    private $admin;
    private $titulacao;

    public function getTitulacao(){
        return $this->titulacao;
    }

    public function setTitulacao($titulacao){
        $this->titulacao = $titulacao;
    }


    public function getAdmin(){
        return $this->admin;
    }

    public function setAdmin($admin){
        if($admin==1){
            $this->admin = $admin;
        }else{
            $this->admin = 0;
        }
    }
    
    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome=$nome;
    }
    public function getCargo()
    {
        return $this->cargo;
    }
    public function setCargo($cargo)
    {
        return $this->cargo = $cargo;
    }
    public function getDiarias()
    {
        return $this->diariasSolicitadas;
    }
    public function setDiarias($diarias)
    {
        return $this->diariasSolicitadas = $diarias;
    }

}
