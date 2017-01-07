<?php

$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once "$root/classes/pagina.php";

class PaginaPrincipal extends Pagina
{
    
}
$pag = new PaginaPrincipal();
$pag->display();
