<?php 
include_once '../model/svaetemplate.php'
?>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
    </head>
<body>

<form action="showtemplate.php" method="get">
<table>
<tr><td>
       Templates: <select name="selecttemplate" id="selecttemplate" onchange="templates();">
<?php 
$result=$a->tables();
while($row=mysql_fetch_assoc($result)){ echo "hiii";?>
	<option value="<?php print_r($row['template_name']);?>"><?php print_r($row['template_name']);?></option>;
<?php }?>
</select></td></tr>
<tr><td>

</form>
</div>
<div id="divs">

</div>
</body>
</html>
<script type="text/javascript">
function templates(){
    $("#donefields").show();
       
		$.ajax({ 
		      type: "POST",
		      url: '../view/showtemplate.php',                  //the script to call to get data          
// 		      data: "fname="+arg,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		      data: "selecttemplate="+$('#selecttemplate').val(),
		            
		       
		        success: function(data){
// 		        $("#addfieldform").html('');
// 		        $("#addfieldform").append(data);
		      $("#divs").html(data);
		        },
		        complete: function () {
		            
		        },
		        error: function(){
		            
		        }
		   }); 
		
}
templates();
</script>