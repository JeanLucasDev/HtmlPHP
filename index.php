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
            case "LISTARESCOLA":
                require "Controller/ControladorListarEscola.php";
                $controlador = new ControladorListarEscola();
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
            case "VIEW/INCLUIRRESPONSAVEL":
                require "Controller/ControladorNovoResponsavel.php";    
                $controlador = new ControladorNovoResponsavel();
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