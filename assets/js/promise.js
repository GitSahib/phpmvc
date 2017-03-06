

$("#promise-test").click(function(){
    var promise = confirmDialog();
    promise.then(function(param){
    	console.log("Accepted");
    },function(param){
    	console.log("Cancelled");
    })
});
$("#tickets-button").click(function(){
    var promise = inputDialog();
    promise.then(function(param){
      param['ajaxAction'] = "getWorklist";
      $.ajax({
        url:'/UD/cgi-bin/ajaxFuncs-test.pl',
        data:param,
        method:'post',
        success:function(data)
        {
          console.log(data);
          console.log(data.length);
        },
        error:function(data){
          console.log(data);
        }

      })
    },function(param){
      console.log(param);
    })
});
function confirmDialog()
{
	var promise = new Promise(function(resolve, reject) {
  	  // do a thing, possibly async, then…
  	  var dialog = $("<div>");
  	  dialog.addClass("panel panel-default dialog")
  	  .append("<div class='panel-heading'>"
  	  		  +"<h1 class='panel-title'>Dialog</h1>"
  	  		  +"</div>")
  	  var body = $("<div class='panel-body'>");
  	  var okButton = $("<button class='btn btn-primary pull-left'>OK</button>");
  	  okButton.click(function(){
  	  	dialog.remove();
  	  	resolve("Stuff worked!");
  	  })
  	  var cancellButton =  $("<button class='btn btn-danger pull-right'>CANCEL</button>");
  	  cancellButton.click(function(){
  	  	dialog.remove();
  	  	reject(Error("It broke"));
  	  });
  	  var footer = $("<div class='panel-footer'></div>");
  	  footer.append(okButton);
  	  footer.append(cancellButton);
  	  dialog.append(body);
  	  dialog.append(footer);
  	  dialog.appendTo("body");
    });
    return promise;
}
function inputDialog()
{
  var promise = new Promise(function(resolve, reject) {
      // do a thing, possibly async, then…
      var dialog = $("<div>");
      dialog.addClass("panel panel-default dialog")
      .append("<div class='panel-heading'>"
            +"<h1 class='panel-title'>Dialog</h1>"
            +"</div>")
      var body = $("<div class='panel-body'>");
      var okButton = $("<button class='btn btn-primary pull-left'>OK</button>");
      okButton.click(function(){
        dialog.remove();
        var data = {query_number:query_number.val(),use_prod:use_prod.is(":checked")?1:0};
        console.log(data);
        resolve(data);
      })
      var cancellButton =  $("<button class='btn btn-danger pull-right'>CANCEL</button>");
      cancellButton.click(function(){
        dialog.remove();
        reject(Error("It broke"));
      });
      var query_number = $("<input type='text' class='form-control'>");
      var use_prod = $("<input type='checkbox'>");
      var qn_wrapper = $("<div class='form_group'><label>Enter Query Number:</label></div>");
      var up_wrapper = $("<div class='form_group'><label>Use Production</label></div>");
      qn_wrapper.append(query_number);
      up_wrapper.prepend(use_prod);
      body.append(qn_wrapper);
      body.append(up_wrapper);
      var footer = $("<div class='panel-footer'></div>");
      footer.append(okButton);
      footer.append(cancellButton);
      dialog.append(body);
      dialog.append(footer);
      dialog.appendTo("body");
    });
    return promise;
}
