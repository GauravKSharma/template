<?php

include_once '../model/svaetemplate.php';
echo $tempid=$_REQUEST['id'];
 $a->setId($_REQUEST['id']);
 $temp=$a->getTable($_REQUEST['id']);
 if(isset ($_REQUEST['msg'])){
    echo "<script>alert('data is saved.')</script>";
    unset ($_REQUEST['msg']);
}
?>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
</head>
<body>
<div style="margin:100px 400px 100px 400px">
     <form action="../controller/storedata.php">
	 <fieldset id="donefields">
    <legend>Template:<?php // echo $_REQUEST['selecttemplate'];?></legend>
<table>
   <input type="hidden" value="<?php echo $_REQUEST['id'];?>" name="tempid">
<?php 
// echo $_REQUEST['selecttemplate'];die;
$result=$a->fetchTemplateInfo();

while($row=mysql_fetch_assoc($result)){
//   print_r($row);
	?>
	
	<tr>
	<td><?php echo $row['label']?></td>
      <?php  if($row['type']=="textbox" ||$row['type']=="checkbox" ||$row['type']=="password"){?>
	<td><input type="<?php echo $row['type']?>" value="<?php echo $row['value']?>" name="<?php echo $row['name']?>" id="<?php echo $row['name']?>"<?php if($row['required']){?> required="<?php echo $row['required'];}?>" <?php if($row['datatype_size'] && $row['validation']){ ?>maxlength="<?php echo $row['datatype_size'];}?>" <?php if($row['datatype']){?> onblur='check<?php echo $row['datatype']?>("<?php echo $row['name']?>")'<?php }?>></td></tr>
	<?php }
        elseif($row['type']=="textarea"){
        ?>
        <td><textarea></textarea></td>
            <?php }
            elseif($row['type']=="combobox"){?>
            <td>    <select name="<?php echo $row['name']?>"  id="<?php echo $row['name']?>" >
                    <?php $options=explode("|",$row['options']);
                    
                    foreach($options as $key=>$value){?>
                    <option><?php echo $value?></option>
                        <?php }
                    ?>
                </select></td>
            <?php } elseif($row['type']=="listbox"){?>
                <td><select name="<?php echo $row['name']?>"  id="<?php echo $row['name']?>" multuple="multiple" <?php if($row['required']){?> required="<?php echo $row['required'];}?>">
                    <?php $options=explode("|",$row['options']);
                    
                    foreach($options as $key=>$value){?>
                    <option><?php echo $value?></option>
                        <?php }
                    ?>
                </select></td>
            <?php }elseif($row['type']=="radio"){?>
<!--                <input type="radio" name="<?php echo $row['name']?>"  id="<?php echo $row['name']?>" multuple="multiple">-->
                    <?php $options=explode("|",$row['options']);
                    
                    foreach($options as $key=>$value){?>
                <td>  <input type="radio" name="<?php echo $row['name']?>" <?php if($row['required']){?> required="<?php echo $row['required'];}?>"><?php echo $value?></td><tr><td></td>
                        <?php }
                    ?>
                </tr>
            
            <?php }?>
         	<?php 
}
?>
                <tr><td></td><td><input type="submit" value="ok">    
</table>
    
</fieldset>
	</form>
</div>
</body>
</html>
<script>
function checkfloat(arg){
	if(!(isNaN($('#'+arg).val()) && isNaN($('#'+arg).val()+".1"))){
		
}
	else{
		
		alert('please enter float value');
		$('#'+arg).val('');
}
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
	function checkvarchar(arg){
		if((isNaN($('#'+arg).val()) && isNaN($('#'+arg).val()+".1"))){
			
		}
			else{
				
				alert('please enter string ');
				$('#'+arg).val('');
		}
		
	}
	function checktext($arg){
		if((isNaN($('#'+arg).val()) && isNaN($('#'+arg).val()+".1"))){
			
		}
			else{
				
				alert('please enter string ');
				$('#'+arg).val('');
		}
		
	}
	function checksmallint(arg){
		if($("#"+arg).val()){
		if(is_int($("#"+arg).val())){}
		else{
			alert("please enter integer");
			$("#"+arg).val('');
		}}
	}
</script>