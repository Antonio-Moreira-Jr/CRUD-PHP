<?php
session_start();
// Pop Up que retorna se o cadastro foi efetuado com sucesso ou não;
if(isset($_SESSION['mensagem'])):  ?>
<script>
      window.onload = function(){
            M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'})
      };
</script>

<?php
endif;
session_unset();
?>