<?php

$root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
require_once "$root/classes/pagina.php";
require_once "$root/tabela_dinamica.php";
class BuscarServidores extends Pagina
{
    public function exibir_body() {
            parent::exibir_body();            
            ?>
                <h3 class = titulo>Buscar Servidores</h3>
                
            <?php
            $this->form_busca();

    }
    public function form_busca()
    {
        ?>
                
               <div class="container">
                
                    <div class="col-sm-1"></div>

                    <div class="col-sm-10 formulario">
                        <form class="form-horizontal table" method="post">
                            <table class="table">
                                <tr>
                                    <th>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="matricula">Matricula:</label>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="nome">Nome:</label>
                                        </div>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <input id ="matricula" type="text" class="form-control matricula" name="matricula" placeholder="Digite uma matricula">
                                            </div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                                <input id="nome" type="text" class="form-control" name="nome" placeholder="Digite um nome">
                                            </div>
                                        </div>
                                    </th>
                                    
                                </tr>
                                    
                            </table>
                            <button onclick="pegaDados()" class="btn btn-lg btn-primary btn-block botaoBusca">Buscar</button>
                            
                        </form>
                    </div>
               </div>
        <div id ="resultados">
            <?php
            $matricula = "";
            $nome = ""; 
            if(filter_has_var(INPUT_POST, 'matricula'))
            {
                $matricula = $_POST['matricula'];
                
            }
            if(filter_has_var(INPUT_POST, 'nome'))
            {
                $nome = $_POST['nome'];
                
            }
            $lista = array("Matricula","CPF","Email","Nome","Alterar?","Remover?");
            $tabela = new tabela_dinamica($lista);
            $tabela->tabela('Resultados',$matricula,$nome);
            ?>
        </div>
        <?php
    }
}

$t = new BuscarServidores();

$t->set_titulo('Buscar Servidores');

$t->display();