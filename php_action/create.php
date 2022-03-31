<?php
//Sessão
session_start();
//Iniciando com a conexão ao BD
require_once 'db.connect.php';

if(isset($_POST['btn-cadastrar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);

    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES 
    ('$nome', '$sobrenome', '$email', '$idade')";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com Sucesso!!";        
        header('Location: ../main.php?sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!!";
        header('Location: ../main.php?erro');
    endif;
endif;