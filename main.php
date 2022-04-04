<?php
//Iniciar conexão com o BD
include_once 'php_action/db.connect.php';
//Message
include_once 'includes/message.php';

// Sessão
//session_start();

// Verificação
if(!isset($_SESSION['logado'])):
	header('Location: main.php');
endif;
// Dados
//$id = $_SESSION['id_usuario'];
/* $idusuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$idusuario'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
 */
//Header
include_once 'includes/header.php';

?>
<!-- Sessão criada para colocar o conteúdo entre o Header e o Footer -->
<section class="conteudo"> <!-- CSS conteudo para tudo que for inserido no meio da página ficar até o final limitado pelo Footer -->
<div class= "row">
      <div class= "col s12 m6 push-m3">
      <h3 class="light">Clientes</h3>
      <table class="striped z-depth-1"> 
            <thead>
                  <tr>
                        <th>Foto:</th>
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
                        <td><img class="materialboxed" width="80" src="./arquivos/<?php echo $dados['imagem'];?>"></td>                        
                        <td><?php echo $dados['nome'];?> </td>
                        <td><?php echo $dados['sobrenome'];?> </td>
                        <td><?php echo $dados['email'];?> </td>
                        <td><?php echo $dados['idade'];?> </td>
                        <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating blue darken-2"><i class="material-icons">edit</i></a></td>
                        <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
                  
                        <!-- Modal Structure -->
                        <div id="modal<?php echo $dados['id']; ?>" class="modal">
                              <div class="modal-content">
                                    <h5>Opa!</h5>
                                    <p>Dejesa excluir esse cliente?</p>
                                    </div>
                                    <div class="modal-footer">
                              <form action="php_action/delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                    <button type="submit" name="btn-deletar" class="btn red">Sim quero deletar</button>
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                              </form>
                              </div>
                        </div>        
                  </tr>
                 <?php endwhile; ?>    
            </tbody>
      </table>
      
      <br>
      <a href="adicionar.php" class="btn blue darken-2">Adicionar Cliente</a> 
           
      </div>
    
</div>
</section>
<!-- Finalizando a Sessão criada para colocar o conteúdo entre o Header e o Footer -->
<?php
//Footer
include_once 'includes/footer.php';
?>