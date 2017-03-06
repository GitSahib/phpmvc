<div class="panel panel-default">
	<div class="panel-heading">
		<h1 class="panel-title">Saved Tickets   <a class="btn-new btn btn-success pull-right" href="/home/ticket/create">New</a></h1>
	</div>
	<div class="panel-body">
		<table class="dataTable table striped display">
			<thead>
				<tr>
					<?php $row_head = $this->data['data'][0];
					foreach($row_head as $key => $value){
						echo "<th>".ucfirst(str_replace("_", " ", $key))."</th>";
					} 
					echo "<th width='10%'>Actions</th>";
					?>
				</tr>
			</thead>
			<tbody>				
				<?php foreach($this->data['data'] as $key_row => $row){
					echo "<tr>";
					foreach ($row as $key_col => $col) {
						echo "<td>".$col."</td>";
					}
					echo "<td>";
					echo "<a href='".ROOT_URL."/ticket/edit/".$row['id']."' class='btn btn-warning'><i class='glyphicon glyphicon-edit'></i></a>";
					echo "<a href='".ROOT_URL."/ticket/delete/".$row['id']."' class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i></a>";
					echo "<a href='".ROOT_URL."/ticket/show/".$row['id']."' class='btn btn-default'><i class='glyphicon glyphicon-eye-open'></i></a>";
					echo "</td>";
					echo "</tr>";
				} ?>				
			</tbody>
		</table>
	</div>
</div>

	
