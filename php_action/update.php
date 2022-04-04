<?php
//Sessão
session_start();
//Iniciando com a conexão ao BD
require_once 'db.connect.php';
//Campos do Formulário sendo colocada nas variáveis e enviadas via metódo POST para o BD.
if(isset($_POST['btn-editar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);
    
    $id = mysqli_escape_string($connect, $_POST['id']);
    
    $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id ='$id'";
//Condição: Conexão efetuada e query passada.
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cliente atualizado com Sucesso!!";        
        header('Location: ../main.php?sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao atualizar cliente!!";
        header('Location: ../main.php?erro');
    endif;
endif;
