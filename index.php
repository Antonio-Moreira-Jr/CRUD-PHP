<?php
//Iniciar conexão com o BD
include_once 'php_action/db.connect.php';
include_once 'includes/message.php';
//Header
//include_once 'includes/header.php'; 
// Sessão
//session_start();

// Botão enviar
if(isset($_POST['btn-entrar'])):
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['login']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);

	if(isset($_POST['lembrar-senha'])):

		setcookie('login', $login, time()+3600);
		setcookie('senha', md5($senha), time()+3600);
	endif;

	if(empty($login) or empty($senha)):
		$_SESSION['mensagem'] = "O campo login/senha precisa ser preenchido!!"; 		
	else:
		// 105 OR 1=1 
	    // 1; DROP TABLE teste

		$sql = "SELECT login FROM usuarios WHERE login = '$login'";
		$resultado = mysqli_query($connect, $sql);		

		if(mysqli_num_rows($resultado) > 0):
		$senha = md5($senha);       
		$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";



		$resultado = mysqli_query($connect, $sql);

			if(mysqli_num_rows($resultado) == 1):
				$dados = mysqli_fetch_array($resultado);
				//mysqli_close($connect);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];
				header('Location: main.php');
			else:
				$_SESSION['mensagem'] = "Usuário e senha não conferem!!"; 
				//$erros[] = "<li> Usuário e senha não conferem </li>";
			endif;

		else:
			$_SESSION['mensagem'] = "Usuário inexistente!!"; 
			//$erros[] = "<li> Usuário inexistente </li>";
		endif;

	endif;

endif;
?>
<?php 
if(!empty($erros)):
	foreach($erros as $erro):
		echo $erro;
	endforeach;
endif;
?>
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
<header>
<nav>
  
    <div class="nav-wrapper blue darken-2 ">
      <div class="container">
        <a href="index.php" class="brand-logo"><i class="material-icons">cloud</i>Sistema de Cadastramento de Clientes</a>
      <!-- </div>
      <ul class="right hide-on-med-and-down">
        <li><a href="main.php"><i class="material-icons">search</i></a></li>
        <li><a href="main.php"><i class="material-icons">view_module</i></a></li>
        <li><a href="main.php"><i class="material-icons">refresh</i></a></li>
        <li><a href="logout.php"><i class="material-icons">exit_to_app</i></a></li>
      </ul>
    </div>     -->
</nav>
</header>
<section class="conteudo">
<div class= "row login">    
        <div>
        	<h3 class="light center">Login</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="input-field col s12 ">
                    <input type="text" name="login" id="login" value="<?php echo isset($_COOKIE['login']) ? $_COOKIE['login'] : '' ?>">
                    <label for="nome">Login</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" name="senha" id="senha" value="<?php echo isset($_COOKIE['senha']) ? $_COOKIE['senha'] : '' ?>">
                    <label for="senha">Senha</label>
                </div> 
                <div class="col m4 push-m1">
                <label>
                    <input type="checkbox" class="filled-in"  />
                    <span>Lembrar Senha</span>
                </label>
                </div>
				<div class="col  m4">  
                <button type="submit" name="btn-entrar" class="btn">Entrar</button>
				</div>                
            </form>      
    	</div>	      
</div>
</section>

<?php
//Footer
include_once 'includes/footer.php';
?>