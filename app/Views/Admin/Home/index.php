<?php  echo $this->extend('admin/layout/principal'); ?>

<?php echo  $this->section('titulo'); ?> <?php echo  $titulo; ?><?php echo  $this->endSection(); ?>



<?php echo  $this->section('estilos'); ?> 
  <!-- Aqui enviamos os estilos do template principal -->



<?php echo  $this->endSection(); ?>




<?php echo  $this->section('conteudo'); ?>
<?php echo  $titulo; ?>
<?php echo  $this->endSection(); ?>



<?php echo  $this->section('scripts'); ?> 
  <!-- Aqui enviamos os scripts do template principal -->


  </script>

<?php echo  $this->endSection(); ?>