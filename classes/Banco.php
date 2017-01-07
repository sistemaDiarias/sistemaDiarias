<?php
    require_once("Cargo.php");
    require_once("Diaria.php");
/**
 * Description of Servidor
 *
 * @author kenad
 */
class Banco
{
    private $codigo_banco;
    private $nome_banco;    
    
    public function getCodigo_Banco()
    {
        return $this->codigo_banco;
    }
    public function setCodigo_Banco($codigo_banco)
    {
        $this->codigo_banco = $codigo_banco;
    }
    public function setNomeBanco($banco)
    {
        $this->nome_banco = $banco;
    }
    public function getNomeBanco()
    {
        return $this->nome_banco;
    }  

}
