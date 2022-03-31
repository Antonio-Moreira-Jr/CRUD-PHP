<?php
//Conexão
include_once 'php_action/db.connect.php';
//Header
include_once 'includes/header.php';
//Selecionar o id do cliente escolhido
if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect,$_GET['id']);

    $sql = "SELECT * FROM clientes WHERE id = '$id' ";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif
?>
<section class="conteudo">
<div class= "row">
      <div class= "col s12 m4 push-m3 ">
        <h3 class="light">Edição de Cliente</h3>
            <form action="php_action/update.php" method="POST">
                <input type="hidden" name = "id" value = <?php echo $dados['id'];?>>
                <div class="input-field col s12">
                    <input type="text" name="nome" id="nome" value= "<?php echo $dados['nome'];?>" >
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="sobrenome" id="sobrenome" value= "<?php echo $dados['sobrenome'];?>" >
                    <label for="sobrenome">Sobrenome</label>
                </div>
                <div class="input-field col s12">
                    <input type="email" name="email" id="email" value= "<?php echo $dados['email'];?>" >
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12">
                    <input type="number" name="idade" id="idade" value= "<?php echo $dados['idade'];?>" >
                    <label for="idade">Idade</label>
                </div>
                <div class="center">
                <button type="submit" name="btn-editar" class="btn">Editar Cliente</button>
                <a href="main.php" class="btn blue darken-2">Lista de Clientes</a>
                </div>
            </form>      
      </div>
</div>
</section>
<?php
//Footer
include_once 'includes/footer.php';
?>