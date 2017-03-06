<!DOCTYPE html>
<?php 
  $this->load_partial("views/_partials/head");
  $this->load_partial("views/_partials/nav");
?>
<html>
<body>
	<div class="home">
		<div class="tickets-list">
			{{body}}
		</div>
	</div>
	<?php $this->load_partial("views/_partials/footer"); ?>
</body>
</html>