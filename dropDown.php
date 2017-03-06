<!DOCTYPE html>
<html>
<?php 
  include "includes/head.php";
?>
<body>

	<div class="home">
		<input type="text" name="somename" id="someid" class="dropdown">
	</div>
	<?php include "includes/footer.php"; ?>

	<script type="text/javascript">
		$('#someid').dropDown({serverResponded:function(data){
			console.log(data);
		}})
		$.fn.extend({
			dropDown : function(options){
				var defaults = {
					url:'',
					value:'ID',
					display:'Name',
					columns:['ID','Name'],
					serverResponded:function(data){

					}};
				options = $.extend(defaults,options);
				loadData();
				var loadData= function()
				{
					serverResponded('something');
				}	
				
			}
		})
	</script>
</body>
</html>

https://icode3.web.att.com/cru/CR-UD-599



