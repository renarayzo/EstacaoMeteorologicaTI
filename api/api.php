<?php
    header('Content-Type: text/html; charset=utf-8');
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //echo "Recebi um POST";
        print_r ( $_POST );
        if(isset($_POST['nome']) && isset($_POST['valor']) && isset($_POST['hora'])){
            if(file_exists("files/".$_POST['nome']."/.")){
                echo file_put_contents("files/".$_POST['nome']."/valor.txt", $_POST['valor']);
                echo file_put_contents("files/".$_POST['nome']."/hora.txt", $_POST['hora']);
                file_put_contents("files/".$_POST['nome']."/log.txt", $_POST['hora'] . ";" . $_POST['valor'] . PHP_EOL, FILE_APPEND);
            }
            else{
                http_response_code(400);
                echo "Sensor Não Existe";
            }   
        }
        else{
            http_response_code(400);
        }
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET'){
        //echo "Recebi um GET";
        if(isset($_GET['nome'])){
            if(file_exists("files/".$_GET['nome']."/valor.txt")){
                echo file_get_contents("files/".$_GET['nome']."/valor.txt");
            }
            else{
                http_response_code(400);
                echo "Sensor Não Existe";
            }
        }
        else{
            echo "Faltam Parametros no GET";
            http_response_code(400);
        }
    }
    else{
        Echo "Metodo não Permitido!";
        http_response_code(403);
    }
    
    //var_dump(file_get_contents("php://input"));
    //echo $_SERVER['REQUEST_METHOD'];
?>