<?php

//Iniciar conexão com o BD
include_once 'php_action/db.connect.php';

//Header
include_once 'includes/header.php';

// Pop Up que retorna se o cadastro foi efetuado com sucesso ou não;
include_once 'includes/message.php';
?>

<div class= "row">
      <div class= "col s12 m6 push-m3">
      <h3 class="light">Clientes</h3>
      <table class="striped"> 
            <thead>
                  <tr>
                        <th>Nome:</th>
                        <th>Sobrenome:</th>
                        <th>Email:</th>
                        <th>Idade:</th>
                  </tr>
            </thead>

            <tbody>
                  
                  <?php
                  //variável sql que vai ser responsável por executar o comando de consulta da tabela
                  $sql = 'SELECT * FROM clientes';
                  //Variável $resultado que possui a query da tabela cliente
                  $resultado = mysqli_query($connect, $sql);
                  //$dados que recebe o array
                  while($dados = mysqli_fetch_array($resultado)):
                  ?>
                  <tr>
                        <td><?php echo $dados['nome']?> </td>
                        <td><?php echo $dados['sobrenome']?> </td>
                        <td><?php echo $dados['email']?> </td>
                        <td><?php echo $dados['idade']?> </td>
                        <td><a href="" class="btn-floating blue"><i class="material-icons">edit</i></a></td>
                        <td><a href="" class="btn-floating red"><i class="material-icons">delete</i></a></td>
                  </tr>
                 <?php endwhile; ?>    
            </tbody>
      </table>
      <br>
      <a href="adicionar.php" class="btn blue">Adicionar Cliente</a>
      
      </div>
</div>
<?php
//Footer
include_once 'includes/footer.php';
?>