<?php 
$default_form = array('title' => '',
'branch_name' => '',
'icode_message' =>'',
'merge_message' =>'',
'id' => 0 );
$form = isset($this->data['form'])?$this->data['form']:$default_form;
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title">Add Ticket Information   </h1>
	</div>
	<div class="panel-body">
		<form>
			<div class="col-md-6 form-group">
			  <label>Title</label>
			  <input type="hidden" name="id" value="<?php echo $form['id'];?>" />
			  <input type="text" class="form-control" value="<?php echo $form['title']?>" name="title" />
			</div>
			<div class="col-md-6 form-group">
			  <label>Image File</label>
			  <input type="file" multiple class="form-control" name="image_files" />
			</div>			
			<div class="col-md-2 form-group">
				<span class="submit btn btn-primary" id="submit_ticket">Save Image</span>
			</div>
		</form>
	</div>
</div>

	
