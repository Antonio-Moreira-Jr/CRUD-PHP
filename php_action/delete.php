<?php
//Sessão
session_start();
//Iniciando com a conexão ao BD
require_once 'db.connect.php';
//Condição; Botão deletar presssionado.
if(isset($_POST['btn-deletar'])):
//Pegar o ID do formulário e salvador na variável.    
    $id = mysqli_escape_string($connect, $_POST['id']);
//Query deletando o cliente com o ID informado no BD.
    $sql = "DELETE FROM clientes WHERE id = '$id'";
 
//Query para puxar os dados do Cliente para deltar a imagem da pasta
    $sql2 = "SELECT * FROM clientes WHERE id = '$id'";   
   
    //Pegando o caminho da imagem no BD para ser deltado.
    if($resultado = mysqli_query($connect, $sql2)):
        $dados = mysqli_fetch_array($resultado);
        $pasta = "../arquivos/";
        $arquivo = $dados['imagem'];
        //Deletando o arquivo no diretório.
         unlink($pasta.$arquivo);
    endif;


//Condição: Conexão efetuada e query passada.
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cliente deletado com Sucesso!!";
        header('Location: ../main.php');
    else:
        $_SESSION['mensagem'] = "Erro ao deletar cliente!!";
        header('Location: ../main.php');
    endif;
endif;