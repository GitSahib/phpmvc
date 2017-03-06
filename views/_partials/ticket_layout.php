<!DOCTYPE html>
<?php 
  $this->load_partial("views/_partials/head");
  $this->load_partial("views/_partials/nav");
?>
<html>
<body>
	<div class="wrapper">
		<div class="content">
			<div class="tickets-list">
				{{body}}
			</div>
		</div>
	</div>
	<?php $this->load_partial("views/_partials/footer"); ?>
</body>
</html>