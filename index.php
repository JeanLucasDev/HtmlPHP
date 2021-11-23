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
            case "VIEW/LOGINESCOLA":
                require "Controller/ControladorLoginEscola.php";    
                $controlador = new ControladorLoginEscola();
                $controlador->processaRequisicao();
                break;
            case "LISTARESCOLA":
                require "Controller/ControladorListarEscola.php";
                $controlador = new ControladorListarEscola();
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
            case "VIEW/LOGINALUNO":
                require "Controller/ControladorLoginAluno.php";    
                $controlador = new ControladorLoginAluno();
                $controlador->processaRequisicao();
                break;
            case "VIEW/INCLUIRFUNCIONARIO":
                require "Controller/ControladorNovoFuncionario.php";    
                $controlador = new ControladorNovoFuncionario();
                $controlador->processaRequisicao();
                break;
            case "VIEW/LOGINFUNCIONARIO":
                require "Controller/ControladorLoginFuncionario.php";    
                $controlador = new ControladorLoginFuncionario();
                $controlador->processaRequisicao();
                break;
            case "VIEW/INCLUIRRESPONSAVEL":
                require "Controller/ControladorNovoResponsavel.php";    
                $controlador = new ControladorNovoResponsavel();
                $controlador->processaRequisicao();
                break;   
            case "VIEW/LOGINRESPONSAVEL":
                require "Controller/ControladorLoginResponsavel.php";    
                $controlador = new ControladorLoginResponsavel();
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