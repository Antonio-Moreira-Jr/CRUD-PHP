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
/* INICIO PAGINAÇÂO PHP */
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos os clientes da tabela
$result_clientes = "SELECT * FROM clientes";
$resultado_clientes = mysqli_query($connect, $result_clientes);

//Contar o total de clientes
$total_clientes = mysqli_num_rows($resultado_clientes);

//Seta a quantidade de clientes por pagina
$quantidade_pg = 5;

//calcular o número de pagina necessárias para apresentar os clientes
$num_pagina = ceil($total_clientes/$quantidade_pg);

//Calcular o inicio da visualizacao
$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar os clientes a serem apresentado na página
$result_clientes = "SELECT * FROM clientes limit $inicio, $quantidade_pg";
$resultado_clientes = mysqli_query($connect, $result_clientes);
$total_clientes = mysqli_num_rows($resultado_clientes);
/* INICIO PAGINAÇÂO PHP */

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
                  
            <?php while($dados = mysqli_fetch_assoc($resultado_clientes)){ ?>
                  
                  
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
                  <?php } ?>   
            </tbody>
      </table>

      <?php
				//Verificar a pagina anterior e posterior
				$pagina_anterior = $pagina - 1;
				$pagina_posterior = $pagina + 1;
			?>
      
  <ul class="pagination center">
    <li class="disabled"><?php
	if($pagina_anterior != 0){ ?><a href="main.php?pagina=<?php echo $pagina_anterior; ?>"><i class="material-icons">chevron_left</i></a>
      <?php }else{ ?>
		
	<?php }  ?>
      </li>
      
      <?php 
	//Apresentar a paginacao
	for($i = 1; $i < $num_pagina + 1; $i++){?>
            <?php if($i == $pagina){?>
                  <li class="active blue darken-2"><a href="main.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            
            <?php }else{ ?>
                  <li class="waves-effect"><a href="main.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php }  ?>

      <?php } ?>  
    
    <li class="waves-effect">
    <?php
	if($pagina_posterior <= $num_pagina){ ?><a href="main.php?pagina=<?php echo $pagina_posterior; ?>"><i class="material-icons">chevron_right</i></a>
      <?php }else{ ?>
     
      <?php }  ?>
      </li>
  </ul>
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