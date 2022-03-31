<?php
//Iniciar conexão com o BD
include_once 'php_action/db.connect.php';

//Header
include_once 'includes/header.php'; 
?>
<section class="conteudo">
<div class= "row">
      <div class= " col m4 push-m4">
        <div class="z-depth-1 center"> 
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
                <button type="submit" name="btn-login" class="btn">Entrar</button>
                <div class="section">
                <a href="main.php" class="btn blue darken-2">Lista de Clientes</a>
                </div>
            </form>      
            </div>
      </div>
</div>
</section>

<?php
//Footer
include_once 'includes/footer.php';
?>