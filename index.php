<?php 

?>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
    </head>
<body>



<div id="divs">
    
    <input type="text" name="search" onkeyup="templates();" id="search">
    <a href="view/master.php">Add Template</a>
    <table id="divs1" width="800" style="text-align: center">
    </table>
</div>
</body>
</html>
<script type="text/javascript">
    function remove(arg){
        $.ajax({ 
		      type: "POST",
		      url: 'controller/deletetemplate.php',                  //the script to call to get data          
// 		      data: "fname="+arg,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		      data: "arg="+arg,
		            
		       
		        success: function(data){
// 		        $("#addfieldform").html('');
// 		        $("#addfieldform").append(data);
                     alert(data);
                     templates();
		        },
		        complete: function () {
		            
		        },
		        error: function(){
		            
		        }
		   });
    }
function templates(){
//    $("#donefields").show();
       
		$.ajax({ 
		      type: "POST",
		      url: 'controller/searchtemplates.php',                  //the script to call to get data          
// 		      data: "fname="+arg,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		      data: "like="+$('#search').val(),
		            
		       
		        success: function(data){
// 		        $("#addfieldform").html('');
// 		        $("#addfieldform").append(data);
                        if(data==''){
                          $("#divs1").html('');  
                        }else{
		      $("#divs1").html("<tr><th>Sr.No.</th><th>Template Name</th><th colspan='2'>Action</th></tr>");
                      $("#divs1").append(data);
                      }
		        },
		        complete: function () {
		            
		        },
		        error: function(){
		            
		        }
		   }); 
		
}

// alert(!(isNaN('s1.2') && isNaN('1.2'+".1")));

</script>