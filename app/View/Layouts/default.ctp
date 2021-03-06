<?php
$cakeDescription = __d('cake_dev', 'CakeBLOG');
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <!-- TITLE -->
    <title> <?php echo $cakeDescription ?> </title>

	<!-- ICON -->
    <link rel="shortcut icon" href="/img/favicon.png"/>

    <!-- META TAGS -->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<!-- CSS -->
	<?php echo $this->Html->css('app');?>
</head>

<body>
	<?php echo $this->Flash->render(); ?>
	<?php echo $this->fetch('content'); ?>

	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div id="modalContent" class="modal-content" style="width:auto; margin:auto; max-width:667px;"></div>
		</div>
	</div>

	<!-- LIBS -->
	<?php echo $this->Html->script('Bootstrap/jquery-3.5.1.min');?>
	<?php echo $this->Html->script('Bootstrap/popper.min');?>
	<?php echo $this->Html->script('Bootstrap/bootstrap.min');?>
	<?php echo $this->Html->script('Bootstrap/fontawesome');?>
	<?php echo $this->Html->script('SweetAlert/sweetalert2.all.min');?>
	<?php echo $this->Html->script('Dropzone/dropzone');?>
	<?php echo $this->Html->script('CKEditor/ckeditor');?>

	<!-- SCRIPTS -->
	<?php echo $this->Html->script('AppBlog');?>
	<?php echo $this->Html->script('AppPost');?>
	<?php echo $this->Html->script('AppNav');?>
	<?php echo $this->Html->script('AppUser');?>

	<script> var baseUrl = window.location.origin; </script>
	<!-- <script>
    	BalloonEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        });
	</script> -->
</body>
</html>
