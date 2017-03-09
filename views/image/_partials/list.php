<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title">Saved Tickets   <a class="btn-new btn btn-success pull-right" href="<?php echo $this->root_url();?>/image/create">New</a></h1>
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
					
					 <div class="dropdown">
					  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">...
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					    <li><a href='<?php echo $this->action_url("edit/".$row['id']); ?>' class='btn btn-warning'><i class='glyphicon glyphicon-edit'></i></a></li>
					    <li><a href='<?php echo $this->action_url("delete/".$row['id']); ?>' class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i></a></li>
					    <li><a href='<?php echo $this->action_url("show/".$row['id']); ?>' class='btn btn-default'><i class='glyphicon glyphicon-eye-open'></i></a></li>
					  </ul>
					</div> 
				<?php } ?>				
			</tbody>
		</table>
	</div>
</div>

	
