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
			  <label>Branch Name</label>
			  <input type="text" class="form-control" value="<?php echo $form['branch_name']?>" name="branch_name" />
			</div>
			<div class="col-md-12 form-group">
			  <label>ICode Message</label>
			  <textarea class="form-control" name="icode_message"><?php echo $form['icode_message']?></textarea>
			</div>
			<div class="col-md-12 form-group">
			  <label>Merge Message</label>
			  <textarea class="form-control" name="merge_message"><?php echo $form['merge_message']?></textarea>
			</div>
			<div class="col-md-6">
				<label>Read from file:</label>
				<input type="file" class="form-control" name="data-file" id="data-file" />
			</div>
			<div class="col-md-2">
				<span class="bulk_upload btn btn-primary">Bulk Submit</span>
			</div>
			<div class="col-md-2 form-group">
				<span class="submit btn btn-primary" id="submit_ticket">Save Ticket Info</span>
			</div>
		</form>
	</div>
</div>

	
