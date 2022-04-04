<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CRUD PHP</title>



      <!--Import Google Icon Font-->

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Import materialize.css-->

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!-- Importanto CSS criado no VS Code -->

      <link href="css/styles.css" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      </head>
<body>
<?php
include_once 'includes/message.php';
$idusuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$idusuario'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);


?>

<header>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">Perfil</a></li>
  <li><a href="#!">Alterar Senha</a></li>
  <li class="divider"></li>
  <li><a href="logout.php">Sair</a></li>
</ul>
<nav>  
    <div class="nav-wrapper blue darken-2 ">
      <div class="container">
        <a href="main.php" class="brand-logo"><i class="material-icons">cloud</i>Sistema de Cadastramento de Clientes</a>
      </div>
      <ul class="right hide-on-med-and-down">       
        <li><a href="main.php"><i class="material-icons">search</i></a></li>              
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Olá <?php echo $dados['nome']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
    </div>
</nav>
</header>
