<?php
    session_start();
    if(isset($_GET['url'])){
        $url = strtoupper($_GET['url']);
        echo "url= ".$url;
        switch($url){
            case "VIEW/INCLUIRESCOLA":
                require "Controller/ControladorNovaEscola.php";    
                $controlador = new ControladorNovaEscola();
                $controlador->processaRequisicao();
                break;
            case "VIEW/LISTARALUNOS":
                require "Controller/ControladorListarAlunos.php";
                $controlador = new ControladorListarAlunos();
                $controlador->processaRequisicao();
				break;
    
            case "LISTARESCOLA":
                require "Controller/ControladorListarEscola.php";
                $controlador = new ControladorListarEscola();
                $controlador->processaRequisicao();
                break;
            case "VIEW/schoolinfo":
                require "Controller/ControladorPesquisarEscola.php";
                $controlador = new ControladorPesquisarEscola();
                $controlador->processaRequisicao();
                break;  
            case "VIEW/EDITARESCOLA":
                require "Controller/ControladorEditarEscola.php";
                $controlador = new ControladorEditarEscola();
                $controlador->processaRequisicao();
                break;

            case "ADDITEMCARRINHO":
				require "Controller/ControladorAddItemCarrinho.php";
				require_once 'Model/EscolaSession.php';
				$EscolaSession = new EscolaSession();
				$controlador = new ControladorAddItemCarrinho($EscolaSession);
				$controlador->processaRequisicao();
				break;

            case "ADDFUNCIONARIOESCOLA":
				require "Controller/ControladorAddFuncionarioEscola.php";
				require_once 'Model/EscolaSession.php';
				$escolaSession = new EscolaSession();
				$controlador = new ControladorAddFuncionarioEscola($escolaSession);
				$controlador->processaRequisicao();
				break;
            case "VIEW/INCLUIRALUNO":
                require "Controller/ControladorNovoAluno.php";    
                $controlador = new ControladorNovoAluno();
                $controlador->processaRequisicao();
                break;
            case "VIEW/LOGINUSUARIO":
                require "Controller/ControladorLogin.php";    
                $controlador = new ControladorLogin();
                $controlador->processaRequisicao();
                break;
            case "VIEW/INCLUIRFUNCIONARIO":
                require "Controller/ControladorNovoFuncionario.php";    
                $controlador = new ControladorNovoFuncionario();
                $controlador->processaRequisicao();
                break;
            case "VIEW/LISTARFUNCIONARIOS":
                require "Controller/ControladorListarFuncionarios.php";
                $controlador = new ControladorListarFuncionarios();
                $controlador->processaRequisicao();
				break;
            case "VIEW/EDITARFUNCIONARIO":
                require "Controller/ControladorEditarFuncionario.php";
                $controlador = new ControladorEditarFuncionario();
                $controlador->processaRequisicao();
                break;

            case "VIEW/EDITARALUNO":
                require "Controller/ControladorEditarAluno.php";
                $controlador = new ControladorEditarAluno();
                $controlador->processaRequisicao();
                break;

            case "VIEW/INCLUIRRESPONSAVEL":
                require "Controller/ControladorNovoResponsavel.php";    
                $controlador = new ControladorNovoResponsavel();
                $controlador->processaRequisicao();
                break;   
            case "VIEW/PESQUISARUSUARIO":
                require "Controller/ControladorPesquisarUsuario.php";    
                $controlador = new ControladorPesquisarUsuario();
                $controlador->processaRequisicao();
                break;  
            case "VIEW/LOGOUT":
                require "Controller/ControladorLogout.php";
                $controlador = new ControladorLogout();
                $controlador->processaRequisicao();
                break; 
            case "RESTRICT":
                require "View/Restrict";
                break;

            case "VIEW/ADDSALDO":
                require "Controller/ControladorAddSaldo.php";
                $controlador = new ControladorAddSaldo();
                $controlador->processaRequisicao();
                break; 

            

            case "VIEW/LISTARPRODUTOS":
                require "Controller/ControladorListarProdutos.php";    
                $controlador = new ControladorListarProdutos();
                $controlador->processaRequisicao();
                break;


            case "VIEW/INCLUIRCOMIDA":
                require "Controller/ControladorNovaComida.php";    
                $controlador = new ControladorNovaComida();
                $controlador->processaRequisicao();
                break;

            case "VIEW/INCLUIRBEBIDA":
                require "Controller/ControladorNovaBebida.php";    
                $controlador = new ControladorNovaBebida();
                $controlador->processaRequisicao();
                break;

            case "VIEW/EDITARRESPONSAVEL":
                require "Controller/ControladorEditarResponsavel.php";    
                $controlador = new ControladorEditarResponsavel();
                $controlador->processaRequisicao();
                break;

            case "VIEW/EDITARPRODUTOS":
                require "Controller/ControladorEditarProduto.php";    
                $controlador = new ControladorEditarProduto();
                $controlador->processaRequisicao();
                break;


            case "VIEW/EDITARBEBIDA":
                require "Controller/ControladorEditarBebida.php";    
                $controlador = new ControladorEditarBebida();
                $controlador->processaRequisicao();
                break;

            case "VIEW/EDITARCOMIDA":
                require "Controller/ControladorEditarComida.php";    
                $controlador = new ControladorEditarComida();
                $controlador->processaRequisicao();
                break;
            
            case "VIEW/REMOVERPRODUTO":
                require "Controller/ControladorRemoverProduto.php";    
                $controlador = new ControladorRemoverProduto();
                $controlador->processaRequisicao();
                break;
            case "VIEW/REMOVERRESPONSAVEL":
                require "Controller/ControladorRemoverResponsavel.php";    
                $controlador = new ControladorRemoverResponsavel();
                $controlador->processaRequisicao();
                break; 

            case "VIEW/REMOVERALUNO":
                require "Controller/ControladorRemoverAluno.php";    
                $controlador = new ControladorRemoverAluno();
                $controlador->processaRequisicao();
                break; 

            case "VIEW/PESQUISARRESPONSAVEL":
                require "Controller/ControladorPesquisarResponsavel.php";    
                $controlador = new ControladorPesquisarResponsavel();
                $controlador->processaRequisicao();
                break;

            case "VIEW/PESQUISARALUNO":
                require "Controller/ControladorPesquisarAluno.php";    
                $controlador = new ControladorPesquisarAluno();
                $controlador->processaRequisicao();
                break;

            case "VIEW/PAGERESP":
                require "Controller/pageResp.php";    
                $controlador = new pageResp();
                $controlador->processaRequisicao();
                break;

            case "VIEW/LISTARLOJA":
                require_once "Controller/ControladorListarLoja.php";    
                $controlador = new ControladorListarLoja();
                $controlador->processaRequisicao();
                break;

            case "VIEW/CARRINHO":
				require "Controller/ControladorListaCarrinho.php";
				$controlador = new ControladorListaCarrinho();
				$controlador->processaRequisicao();
				break;
            
            case "VIEW/ADDITEMCARRINHO":
				require "Controller/ControladorAddItemCarrinho.php";
				require_once 'Model/CarrinhoSession.php';
				$carrinhoSession = new CarrinhoSession();
				$controlador = new ControladorAddItemCarrinho($carrinhoSession);
				$controlador->processaRequisicao();
				break;

            case "VIEW/CARRINHOALTQUANT":
				require "Controller/ControladorAlteraQuantCarrinho.php";
				require_once 'Model/CarrinhoSession.php';
				$carrinhoSession = new CarrinhoSession();
				$controlador = new ControladorAlteraQuantCarrinho($carrinhoSession);
				$controlador->processaRequisicao();
				break;

            case "VIEW/APAGAITEMCARRINHO":
				require "Controller/ControladorApagaItemCarrinho.php";
				require_once 'Model/CarrinhoSession.php';
				$carrinhoSession = new CarrinhoSession();
				$controlador = new ControladorApagaItemCarrinho($carrinhoSession);
				$controlador->processaRequisicao();
				break;

            case "VIEW/REMOVESALDO":
				require "Controller/ControladorRemoveSaldo.php";
				$controlador = new ControladorRemoveSaldo();
				$controlador->processaRequisicao();
				break;


            default:
                require "Controller/index.php";
                $controlador = new ControladorNovaEscola();
                $controlador->processaRequisicao();
                break;
        }
    }
    else {           //senão, vai para uma página padrão, neste caso a home do site
        $url = '404.php';
    }
?>