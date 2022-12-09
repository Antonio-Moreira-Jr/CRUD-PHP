<?php
//Iniciar conexão com o BD
include_once 'php_action/db.connect.php';
//Message
include_once 'includes/message.php';


// Verificação
if(!isset($_SESSION['logado'])):
	header('Location: main.php');
endif;

//Header
include_once 'includes/header.php';

//Máximo de itens por página;
$itens_por_pagina = 5;

//Buscar página atual
if (!empty ($_GET['pagina'])){
      $pagina = intval($_GET['pagina']);
}
else{
      $pagina = 1;
}
//Buscar os dados do cliente do banco;
$index = ($pagina - 1)  * $itens_por_pagina;
$sql_code = "SELECT * FROM clientes LIMIT $index, $itens_por_pagina";
$execute = mysqli_query($connect, $sql_code) or die($connect->error);
$num = $execute->num_rows;


$num_total = $connect->query("SELECT * FROM clientes")->num_rows;

$num_paginas = ceil($num_total/$itens_por_pagina);

?>
<!-- Sessão criada para colocar o conteúdo entre o Header e o Footer -->
<section class="conteudo"> <!-- CSS conteudo para tudo que for inserido no meio da página ficar até o final limitado pelo Footer -->
<div class= "row">
      <div class= "col s12 m6 push-m3">
      <h3 class="light">Clientes</h3>
      <?php if($num > 0){ ?> 
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
                  //$dados que recebe o array
                  while($dados = mysqli_fetch_array($execute)):                 
                  
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
                                    <p>Deseja excluir esse cliente?</p>
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
      <?php } ?> 
      <br>
      <a href="adicionar.php" class="btn blue darken-2">Adicionar Cliente</a> 
      <ul class="pagination center">
                  <li class="disabled"><a href="main.php?pagina=0"><i class="material-icons">chevron_left</i></a></li>
                        <?php 
                        for($i=1;$i<=$num_paginas;$i++) { 
                              $estilo = "";
                              if($pagina == $i)
                                    $estilo = "class=\"active\"";
                              ?>
                  <li <?php echo $estilo; ?>><a href="main.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                  <?php } ?>
                  <li class="waves-effect"><a href="main.php?pagina=<?php echo $num_paginas; ?>"><i class="material-icons">chevron_right</i></a></li>
            </ul>   
      </div>
    
</div>
</section>
<!-- Finalizando a Sessão criada para colocar o conteúdo entre o Header e o Footer -->
<?php
//Footer
include_once 'includes/footer.php';
?>