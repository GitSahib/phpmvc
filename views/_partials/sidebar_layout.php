<!DOCTYPE html>
<?php 
  $this->load_partial("views/_partials/head");?>
  <link rel="stylesheet" type="text/css" href="<?php echo $this->root_url()?>/assets/css/sidebar.css">
<html>
<body>
	<?php 
	 $this->load_partial("views/_partials/nav");
  	 $this->load_partial("views/_partials/sidebar");?>
	<div class="main">
		{{body}}
	</div>
	<?php $this->load_partial("views/_partials/footer"); ?>
	<script type="text/javascript" src="<?php echo $this->root_url()?>/assets/js/sidebar.js"></script>
</body>
</html>