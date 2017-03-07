<!DOCTYPE html>
<?php 
  $this->load_partial("views/_partials/head");?>
<html>
<body>
	<?php 
	 $this->load_partial("views/_partials/nav");
  	 $this->load_partial("views/_partials/sidebar");?>
	<div class="home">
		<div class="tickets-list">
			{{body}}
		</div>
	</div>
	<?php $this->load_partial("views/_partials/footer"); ?>
</body>
</html>