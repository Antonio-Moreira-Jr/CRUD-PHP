<?php
//Header
include_once 'php_action/db.connect.php';
include_once 'includes/header.php'; 
?>
<!-- Sessão criada para colocar o conteúdo entre o Header e o Footer -->
<section class="conteudo"> <!-- CSS conteudo para tudo que for inserido no meio da página ficar até o final limitado pelo Footer -->
<div class= "row">
      <div class= "col s12 m6 push-m3">
        <h3 class="light">Cadastro de Cliente</h3>
            <form action="php_action/create.php" method="POST" enctype="multipart/form-data">
                <div class="input-field col s12">
                    <input type="text" name="nome" id="nome" required>
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="sobrenome" id="sobrenome" required>
                    <label for="sobrenome">Sobrenome</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s2">
                    <input type="number" name="idade" id="idade" required>
                    <label for="idade">Idade</label>
                </div>
                 <!-- INICIO Imput Imagem -->
                    <div class="file-field input-field col s10">                    
                        <div class="btn blue darken-2">                        
                            <input type="file" name="arquivo" multiple required>
                            <span>Imagem do Cliente</span>
                        </div>                        
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload one or more files">                            
                        </div>
                    </div>
                <!-- FIM Imput Imagem -->                
                <div class="center">
                <button type="submit" name="btn-cadastrar" class="btn">Cadastrar Cliente</button>
                <a href="main.php" class="btn blue darken-2">Lista de Clientes</a>
                </div>
            </form>      
      </div>
</div>
</section>
<!-- Finalizando a Sessão criada para colocar o conteúdo entre o Header e o Footer -->
<?php
//Footer
include_once 'includes/footer.php';
?>