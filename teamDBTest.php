<!DOCTYPE html>
<html>
<?php 
  include "includes/head.php";
  include "includes/nav.php";
?>
<body>

	<div class="">
		<div class="post-form">
			<div class="col-md-6 form-group">
			<label>Shift Name</label>
			<input type="text" class="form-control" name="shiftName">
			</div>
			<div class="col-md-6 form-group">
			<label>Team ID</label>
			<input type="text" name="teamID" class="form-control">

			</div>
			<div class="col-md-6">
				<button class="btn btn-primary" id="btnSaveShift">Save Shift</button>
			</div>
		</div>
		<div class="post-result">
		</div>
	</div>
	<?php include "includes/footer.php"; ?>;
	<script type="text/javascript">
		(function(){
			$.ajax({
					url:'http://m5devacoe01.gcsc.att.com:23178/shift',
					method:'get',
					contentType:'json',
					success:function(data){
						console.log("success",data);
						var strHtml;
						$(data).each(function(index,shift){
							strHtml += "<label>ShiftID:</label><span>"+shift.shiftID+"</span>";
							strHtml += "<label>TeamID:</label><span>"+shift.teamID+"</span>";
							strHtml += "<label>ShiftName:</label><span>"+shift.shiftName+"</span><br>";
						});
						$(".post-result").html(strHtml);
					},
					error:function(data){
						console.log("error",data);
					}
				});
			$("#btnSaveShift").click(function(){
				var data = {teamID:$("input[name='teamID']").val(),shiftName:$("input[name='shiftName']").val()};
				console.log(data);
				$.ajax({
					url:'http://m5devacoe01.gcsc.att.com:23178/shift',
					data:data,
					method:'post',
					contentType:'json',
					success:function(data){
						console.log("success",data);
					},
					error:function(data){
						console.log("error",data);
					}
				});
			});
		})();
	</script>
</body>
</html>



