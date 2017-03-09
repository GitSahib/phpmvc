<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title">Saved Tickets   <a class="btn-new btn btn-success pull-right" href="<?php echo $this->root_url();?>/ticket/create">New</a></h1>
	</div>
	<div class="panel-body">
		<table class="dataTable table striped display">
			<thead>
				<tr>
					<?php $row_head = count($this->data['data'])>0?$this->data['data'][0]:[];
					foreach($row_head as $key => $value){
						echo "<th>".ucfirst(str_replace("_", " ", $key))."</th>";
					} 
					echo "<th width='15%'>Actions</th>";
					?>
				</tr>
			</thead>
			<tbody>				
				<?php foreach($this->data['data'] as $key_row => $row){
					echo "<tr>";
					foreach ($row as $key_col => $col) {
						echo "<td>".$col."</td>";
					}?>	
					<td>				
					 <div class="dropdown">
					  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">...
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu padding-top-none padding-bottom-none">
					    <li class="list-group-item list-group-item-warning"><a href='<?php echo $this->action_url("edit/".$row['id']); ?>'><i class='glyphicon glyphicon-edit'></i> Edit</a></li>
					    <li class="list-group-item list-group-item-danger"><a href='<?php echo $this->action_url("delete/".$row['id']); ?>'><i class='glyphicon glyphicon-trash'></i> Delete</a></li>
					    <li class="list-group-item list-group-item-info"><a href='<?php echo $this->action_url("show/".$row['id']); ?>'><i class='glyphicon glyphicon-eye-open'></i> View</a></li>
					  </ul>
					</div>
					</td> 
				<?php } ?>				
			</tbody>
		</table>
	</div>
</div>

	
