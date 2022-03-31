<?php
//Sessão
session_start();
//Iniciando com a conexão ao BD
require_once 'db.connect.php';

if(isset($_POST['btn-deletar'])):
    
    $id = mysqli_escape_string($connect, $_POST['id']);
    
    $sql = "DELETE FROM clientes WHERE id = '$id'";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cliente deletado com Sucesso!!";        
        header('Location: ../main.php?sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao deletar cliente!!";
        header('Location: ../main.php?erro');
    endif;
endif;