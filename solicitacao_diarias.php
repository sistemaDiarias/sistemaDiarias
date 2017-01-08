<?php
    $root = $_SERVER['DOCUMENT_ROOT'].'/sistemaDiarias';
    require_once "$root/classes/pagina.php";
    require_once "$root/DAO/ConexaoDAO.php";
    require_once "$root/DAO/BancoDAO.php";
    require_once "$root/classes/Servidor.php";
    require_once "$root/DAO/ServidorDAO.php";    
    require_once "$root/classes/Cargo.php";
    require_once "$root/DAO/CargoDAO.php";
    
    class Pagina_Solicitacao_Diarias extends Pagina{
        public function exibir_body() {
            parent::exibir_body();            
            ?>
                <h3 class = titulo>Solicitação de Diárias</h3>
                
            <?php
            
            $this->exibir_form_solicitacao_diarias();
        }
        public function exibir_form_solicitacao_diarias(){
                $bandoDao = new BancoDAO();
                $arrayBancos = $bandoDao->listarTodos();
                $codigo_agencia;
                //
                $nome_evento;
                $local_evento;
                $periodo_evento;
                $abrangencia_evento; //internacional, nacional; regional;
                $titulo_trabalho;
                $titulo_projeto_cadastrado_prop;
                $check_auxilio; //checkbox para sim ou nao, se sim, textfield para quantANos
                $justificativa;
                $tipo_auxilio; //checkbox para passagem, diarias, ajuda financeira, e textfiel para descricao
                $pontuacao;
                $importancia;
                 
                    
              ?>
            
                
            <div class="container">
                
                <div class="col-sm-1"></div>
                
                <div class="col-sm-10 formulario">
                    <form class="form-horizontal table" action="controller/logica_solicitacao_diarias.php" method="post">
                       
                        
                       
                        <div class="row">
                            <div class="col-sm-6">
                            <label>Banco</label>                                     
                            <select required="required" class="form-control" name="banco" id="banco">
                                <option value="">Selecione um Banco</option>
                                <?php
                                foreach ($arrayBancos as $banco){
                                  echo "<option value='{$banco['cod_banco']}'>{$banco['cod_banco']} - {$banco['nome']}</option>\n";
                                }
                                ?>
                            </select>
                            </div>
                            
                            <div class="col-sm-6">
                                <label>Agencia do Banco</label>
                                <input maxlength="15" type="text" required="required" class="form-control" name="agencia" placeholder="Digite Agencia">
                            </div>                            
                        </div>
                        <br>
                        <div class="row">    
                            <div class="col-sm-6">
                              <label>Nome do Evento</label>
                              <input type="text" required="required" class="form-control" name="nome_evento" placeholder="Digite o Nome do Evento">                          
                            </div>

                            <div class="col-sm-6">
                                <label>Local do Evento:</label>
                                <input type="text" required="required" class="form-control" name="local_evento" placeholder="Digite o Local do Evento">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Periodo do Evento</label>      
                                <input type="text" required="required" class="form-control" name="periodo_evento" placeholder="Digite o Periodo do Evento">
                            </div>

                            <div class="col-sm-6">
                                <label> Abrangência do Evento:</label>
                                <select class="form-control" name="abrangencia_evento">
                                    <option value ="1">Regional</option>
                                    <option value ="2">Nacional</option>
                                    <option value ="3">Internacional</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Título do Trabalho</label>         
                                <input type="text" required="required" class="form-control" name="titulo_trabalho" placeholder="Digite o Título do Trabalho">
                            </div>

                            <div class="col-sm-6">
                              <label>Título do Projeto Cadastrado Na PROP</label>        
                                  <input type="text" required="required" class="form-control" name="titulo_projeto_cadastrado_prop" placeholder="Digite o Título do Projeto Cadastrado Na PROP">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                              <label>Recebeu Auxilio Nos Anos Anteriores?</label>                          
                              <input class="radio-inline" type="radio" name="auxilio_anterior" value="sim"><strong>Sim</strong>
                              <input class="radio-inline" type="radio" name="auxilio_anterior" value="nao"><strong>Não</strong>                         
                            </div>

                            <div class="col-sm-4">
                                <label>Em caso afirmativo, indique os anos</label>        
                                <input type="number" required="required" class="form-control" name="justificativa" placeholder="Digite os anos">
                            </div>

                            <div class="col-sm-4">
                                <label>Auxilio Solicitado</label>
                                <select class="form-control" name="tipo_auxilio">
                                    <option value ="1">Passagem</option>
                                    <option value ="2">Diaria</option>
                                    <option value ="3">Ajuda Financeira</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                              <label>Pontuação de Produção Científica nos Ultimos 5 Anos</label>    
                                  <input type="number" required="required" class="form-control" name="pontuacao" placeholder="Digite sua pontuacao">
                            </div>

                            <div class="col-sm-6">
                                <a href="#" onclick="window.open('http://google.com', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');">
                                    ANEXAR ARQUIVOS COMPROVANDO PONTUAÇÃO CIENTÍFICA
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Apenas para Cursos/Treinamentos, diga a importância</label>
                                <input type="text" required="required" class="form-control" name="importancia" placeholder="Digite a importância">
                            </div>
                        </div>
                        <br>
                        <div class="row">        
                            <button type="submit" class="btn btn-primary btn-block botao">Cadastrar</button>
                        </div>
                        
                  </form>
                    
                </div>
            </div>
            <?php    
        }
        
    }
    
    $t = new Pagina_Solicitacao_Diarias();
    
    $t->set_titulo('Solicitação de Diárias');
    
    $t->display();
    
    function exibir_sucesso(){        
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="alert alert-success col-sm-10">
                    <strong>O Servidor foi cadastrado com sucesso!</strong> 
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>        
        <?php
    }
    function exibir_erro(){        
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="alert alert-danger col-sm-10">
                    <strong>O Servidor não foi contratado!</strong> 
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>        
        <?php
    }
    function exibir_erroSenha(){        
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="alert alert-danger col-sm-10">
                    <strong>As senhas não conferem!</strong> 
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>        
        <?php
    }
    function listagemCargo()
    {
        $dao = new ConexaoDAO();
        $cargoDAO = new CargoDAO($dao->getConexao());
        $cargos = $cargoDAO->listarTodos();
        $dao->fecharConexao();
        return $cargos;
    }
        ?>
