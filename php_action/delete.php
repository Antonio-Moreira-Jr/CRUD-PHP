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
//Condição: Conexão efetuada e query passada.
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cliente deletado com Sucesso!!";        
        header('Location: ../main.php?sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao deletar cliente!!";
        header('Location: ../main.php?erro');
    endif;
endif;