<?php
//Sessão
session_start();
//Iniciando com a conexão ao BD
require_once 'db.connect.php';
//Condição; Botão cadastrar presssionado.
if(isset($_POST['btn-cadastrar'])):
//Campos do Formulário sendo colocada nas variáveis e enviadas via metódo POST para o BD.   
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);
//upload do arquivo antes
    $dir = "../CRUD-PHP/imagens";
//recebendo o arquivo multipart
    $file = $_FILES["imagem"];

    $destino= "$dir/".$file["name"];

if(move_uploaded_file($file["tmp_name"], $destino)){
    echo "Arquivo enviado com sucesso";
}
else {
    echo "Erro, o arquivo não pode ser enviado.";
}

//Query criando o cliente no BD.
    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade, imagem) VALUES 
    ('$nome', '$sobrenome', '$email', '$idade', '$destino')";
//Condição: Conexão efetuada e query passada.
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Cadastrado com Sucesso!!";        
        header('Location: ../main.php?sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!!";
        header('Location: ../main.php?erro');
    endif;
    
endif;

