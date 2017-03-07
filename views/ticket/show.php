<?php $view_object = $this->data['view_object'];?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title"><?php echo $view_object['title'];?></h1>
	</div>
	<div class="panel-body">
		<form>
			<div class="col-md-6 form-group">
			  <label>Branch Name:</label>
			  <span><?php echo $view_object['branch_name'];?></span>
			</div>
			<div class="col-md-6 form-group">
			  <label>ICode Message:</label>
			  <span><?php echo $view_object['icode_message'];?></span>
			</div>
			<div class="col-md-12 form-group">
			  <label>Merge Message:</label>
			  <span><?php echo $view_object['merge_message'];?></span>
			</div>
			
			<div class="col-md-12 form-group">
				<a href="<?php echo $this->root_url();?>/ticket/" class="btn btn-primary">Back to list</a>
			</div>
		</form>
	</div>
</div>

	
