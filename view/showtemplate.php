<?php

include_once '../model/svaetemplate.php';
//$a=new savetemplate();
echo $tempid=$_REQUEST['id'];
 $a->setId($_REQUEST['id']);
 $temp=$a->getTable($_REQUEST['id']);
 
?>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
    </head>
<body>
   <form id="frmvote">    
       
    <div id="addfieldform" style="border:1px solid black; width:500px;float: left" hidden="true" >
        <input type="text"  name="templateName" id="templateName" value="<?php echo $temp ?>">
        <input type="text" name="abc" id="tempid" value="<?php echo $tempid ?>">
<table>
<tr>
<td>Select Field Type</td>
<td><select name="fieldtype" id="select" onchange="showOptions();" >
<option value="textbox" selected="selected">Text Box</option>
<option value="textarea">Text Area </option>
<option value="checkbox">Check Box</option>
<option value="combobox">Combo Box</option>
<option value="listbox">List Box</option>
<option value="radio">Radio Button</option>
<option value="password">Password </option>

</select></td>
<tr>
<td>Field Label</td>
<td> Default Value</td>
</tr>
<tr><td><input type="text" name="label" id="label" require="required" onblur="fieldavail();" ></td>
<td><input type="text" name="defaultvalue" id="default"></td>

</tr>
<div id="uservalidation">
<tr><td>Required <input type ="checkbox" name="required" value="1" id="required"></td>
    <td>
   Type of data: <select name="datatype" id="datatype">
        <option value="float">Numeric</option>
        <option value="int">Integer</option>
        <option value="varchar">varchar</option>
        <option value="smallint">Small Int</option>
         <option value="text">Text</option>
                 
    </select>
    </td></tr>
    <tr><td>Validation:<input type="checkbox" name="validation" value="1"></td><td>size:<input type="number" name="datasize" id="datasize" onblur="checkint('datasize');" maxlength="4"></td></tr>
    </div>
<tr><td><input type="button" id="more" value="Add  Items" hidden="true" onclick="moreOptions();"></td></tr>
<tr><input type="text" id="count" name="count" value=1 hidden="true">
<td><input type="button" value="save"  id="save" onclick="validate();">
</tr>
</table>
        <div id="addfieldform1">
    </div>
</div>
   </form>
<div style="margin:100px 400px 100px 400px">
    <input type ="text" id="tempid" value="<?php echo $_REQUEST['id'] ?>">
     <form action="../controller/storedata.php">
	 <fieldset id="donefields">
    <legend>Template:<?php //echo $_REQUEST['selecttemplate'];?></legend>
<table>
   <input type="hidden" value="<?php //echo $_REQUEST['selecttemplate'];?>" name="tempid">
<?php 
// echo $_REQUEST['selecttemplate'];die;
$result=$a->fetchTemplateInfo();

while($row=mysql_fetch_assoc($result)){
  print_r($row);
	?>
	
	<tr>
	<td><?php echo $row['label']?></td>
      <?php  if($row['type']=="textbox" ||$row['type']=="checkbox" ||$row['type']=="password"){?>
        <td><input type="<?php echo $row['type']?>" value="<?php echo $row['value']?>" name="<?php echo $row['name']?>" id="<?php echo $row['name']?>"<?php if($row['required']){?> required="<?php echo $row['required'];}?>"></td><td><input type='button' value='DELETE' onclick='remove("<?php echo $row['id']?>")'></td>
	<?php }
        elseif($row['type']=="textarea"){
        ?>
        <td><textarea></textarea></td><td><input type='button' value='DELETE' onclick='remove("<?php echo $row['id']?>")'></td>
            <?php }
            elseif($row['type']=="combobox"){?>
            <td>    <select name="<?php echo $row['name']?>"  id="<?php echo $row['name']?>">
                    <?php $options=explode("|",$row['options']);
                    
                    foreach($options as $key=>$value){?>
                    <option><?php echo $value?></option>
                        <?php }
                    ?>
                </select></td><td><input type='button' value='DELETE' onclick='remove("<?php echo $row['id']?>")'></td>
            <?php } elseif($row['type']=="listbox"){?>
                <td><select name="<?php echo $row['name']?>"  id="<?php echo $row['name']?>" multuple="multiple">
                    <?php $options=explode("|",$row['options']);
                    
                    foreach($options as $key=>$value){?>
                    <option><?php echo $value?></option>
                        <?php }
                    ?>
                </select></td><td><input type='button' value='DELETE' onclick='remove("<?php echo $row['id']?>")'></td>
            <?php }elseif($row['type']=="radio"){?>
<!--                <input type="radio" name="<?php echo $row['name']?>"  id="<?php echo $row['name']?>" multuple="multiple">-->
                    <?php $options=explode("|",$row['options']);
                    
                    foreach($options as $key=>$value){?>
                <td>  <input type="radio" name="<?php echo $row['name']?>"><?php echo $value?></td><tr><td></td>
                        <?php }
                    ?>
                </tr>
            
            <?php }?>
         	<?php 
}
?>                  
                <tr><td></td><td><input type="button" value="Add field" onclick="show();">    
</table>
    
</fieldset>
	</form>
</div>
</body>
</html>
<script type="text/javascript">
    var counter=0;
    function show(){
       $("#addfieldform").show(); 
    }
    function remove(arg){
        $.ajax({ 
		      type: "POST",
		      url: '../controller/removefields.php',                  //the script to call to get data          
// 		      data: "fname="+arg,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		      data: "id="+arg+"&tempid="+$("#tempid").val(),
		            
		       
		        success: function(data){
// 		        $("#addfieldform").html('');
// 		        $("#addfieldform").append(data);
                     alert(data);
                     window.location="showtemplate.php?id="+$('#tempid').val();
		        },
		        complete: function () {
		            
		        },
		        error: function(){
		            
		        }
		   });
    }
    
  function save1(){
	$("#donefields").show();
       
		$.ajax({ 
		      type: "POST",
		      url: '../controller/abc.php',                  //the script to call to get data          
// 		      data: "fname="+arg,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		      data: $('#frmvote').serialize(),
		            
		       
		        success: function(data){
// 		        $("#addfieldform").html('');
// 		        $("#addfieldform").append(data
                        alterStructure();
		       var count= $("#count").val();
                       count++;
                       $("#count").val(count);
		            $("#addfieldform1").html(''); 
		        },
		        complete: function () {
		            
		        },
		        error: function(){
		            
		        }
		   }); 
		}

function showOptions(){
$("#addfieldform1").html('');
	var select=$("#select").val();
	if(select=="combobox" || select=="listbox" ||select=="radio"){
            $("#uservalidation").hide();
          if(select=="radio") 
           $("#more").val("Add buttons") ;  
       else
        $("#more").val("Add Items") ;
$("#more").show();}
	else{$("#more").hide();
             $("#uservalidation").show();
	}



}
var rlabel=counter;
function moreOptions(){

	alert("111");
        var select=$("#select").val();
           if(select=="radio"){
            $("#addfieldform1").append("<tr><td><input type='radio' id='radio"+counter+"' name='radio"+counter+"'><td><input type='text' name='option[]' id='radiolabel"+rlabel+"'></td></td></tr>");   
            rlabel++;
           }
           else{
	counter++;
        $("#addfieldform1").append("<tr><td>Option</td><td><input type='text' id='option"+counter+"' name='option[]'></td></tr>");

}}
function alterStructure(){

    $.ajax({ 
		      type: "POST",
		      url: '../controller/alter.php',                  //the script to call to get data          
 		      data: "id="+$("#tempid").val()+"&label="+$("#label").val(),                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
//		      data: $('#frmvote').serialize(),
		            
		       
		        success: function(data){
// 		        $("#addfieldform").html('');
// 		        $("#addfieldform").append(data);
		       var count= $("#count").val();
                       count++;
                       $("#count").val(count);
		            $("#addfieldform1").html(''); 
		        },
		        complete: function () {
		            
		        },
		        error: function(){
		            
		        }
		   }); 

}
function fieldavail(){
	
  	$.ajax({ 
		      type: "POST",
		      url: '../controller/fieldavailability.php',                  //the script to call to get data          
//		      data: "fname="+arg,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		      data: "selecttemplate="+$('#templateName').val()+"&field="+$("#label").val()+"&count="+$("#count").val(),
		            
		       
		        success: function(data){
//		        $("#addfieldform").html('');
//		        $("#addfieldform").append(data);
		    if(data){
                     alert("field exists");
                     $('#label').val('');
		    }
                 
		        },
		        complete: function () {
		            
		        },
		        error: function(){
		            
		        }
		   }); 
  
}
function validate() {
	 
	
//  alert('hiiivalidate');
	  $.ajax({ 
	      type: "POST",
	      url: '../controller/fieldavailability.php',                  //the script to call to get data          
//	      data: "fname="+arg,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
	      data: "selecttemplate="+$('#templateName').val()+"&field="+$("#label").val()+"&count="+$("#count").val(),
	            
	       
	        success: function(data){
//	        $("#addfieldform").html('');
//	        $("#addfieldform").append(data);
	    if(data){
                alert("field exists");
                $('#label').val('');
             
                alert('dsafa');
           
	    }
	    else{
	    	  var error="";
           
           
               if($("#label").val()==''){
               alert('Enter a label.');
               error ="error";
              }
              if(error=="" && $("#label").val()!=''){
           	   
                  save1();
                  alert("good");
              }
	  	
		    }
            
	        },
	        complete: function () {
	            
	        },
	        error: function(){
	            
	        }
	   }); 

 }
function is_int(value){
	   for (i = 0 ; i < value.length ; i++) {
	      if ((value.charAt(i) < '0') || (value.charAt(i) > '9')) {return false;}
	    }
	   return true;
	}
	function checkint(arg){
		if($("#"+arg).val()){
		if(is_int($("#"+arg).val())){}
		else{
			alert("please enter integer");
			$("#"+arg).val('');
		}}
	}
</script>