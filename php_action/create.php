<?php
//Sessão
//session_start();
//Iniciando com a conexão ao BD
require_once 'db.connect.php';
//Condição; Botão cadastrar presssionado.
if(isset($_POST['btn-cadastrar'])):
//Campos do Formulário sendo colocada nas variáveis e enviadas via metódo POST para o BD.   
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $idade = mysqli_escape_string($connect, $_POST['idade']);

    //Validando formado da imagem
    $formatosPermitidos = array("pgn", "jpeg", "jpg", "gif");
    $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

    if(in_array($extensao, $formatosPermitidos)):
        $pasta = "../arquivos/";
        $temporario = $_FILES['arquivo']['tmp_name'];
        $novoNome = uniqid().".$extensao";

        if(move_uploaded_file($temporario, $pasta.$novoNome)):
            $_SESSION['mensagem'] = "Upload feito com sucesso!"; 
        else:
            $_SESSION['mensagem'] = "Erro, não foi possivel fazer upload!"; 
        endif;
        else:
    $_SESSION['mensagem'] = "Formato não Permitido!"; 
    endif;

    //Fim da criação da Imagem

    //Query criando o cliente no BD.
    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade, imagem) VALUES 
    ('$nome', '$sobrenome', '$email', '$idade', '$novoNome')";
//Condição: Conexão efetuada e query passada.
    if(mysqli_query($connect, $sql)):
        //$_SESSION['mensagem'] = "Cadastrado com Sucesso!!";        
        header('Location: ../main.php?sucesso');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar!!";
        header('Location: ../main.php?erro');
    endif;
endif;
