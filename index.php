<?php
//Iniciar conexão com o BD
include_once 'php_action/db.connect.php';

//Header
include_once 'includes/header.php'; 
?>

<div class= "row">
      <div class= "col s12 m3 push-m3 ">
        <h3 class="light">Login</h3>
            <form action="php_action/create.php" method="POST">
                <div class="input-field col s12">
                    <input type="text" name="login" id="login" required>
                    <label for="nome">Login</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" name="senha" id="senha" required>
                    <label for="senha">Senha</label>
                </div>                
                <button type="submit" name="btn-cadastrar" class="btn">Cadastrar Cliente</button>
                <a href="main.php" class="btn blue darken-2">Lista de Clientes</a>
            </form>      
      </div>
</div>




<?php
//Footer
include_once 'includes/footer.php';
?>