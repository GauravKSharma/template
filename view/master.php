
<html>
<head><title>Add Template</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
  
  <!-- standalone page styling (can be removed) -->
  <link rel="shortcut icon" href="/media/img/favicon.ico">
  <link rel="stylesheet" type="text/css"
        href="standalone.css"/>

  <link rel="stylesheet" type="text/css"
      href="overlay-basic.css"/>
 <style>
      .details {
 
height:100%;
 background-color:gainsboro;
  }
 </style>
</head>
<body>

<form id="frmvote">
<table>
<tr>
<td>
Template Name:</td>
<td><input type="text" name="templateName" required="required" id="templateName" onblur="templateavail();" ondblclick="refresh();"></td>
</tr>
<tr>
<td><input type="button" value="Add Fields" name="addfield" onclick="showFields();"></td>
</tr></table>
<div id="addfieldform" style="border:1px solid black; width:500px;float: left" >
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
<option value="date">Date</option>

</select></td>
<tr>
<td>Field Label</td>
<td> Default Value</td>
</tr>
<tr><td><input type="text" name="label" id="label" require="required" onblur="fieldavail();"></td>
<td><input type="text" name="defaultvalue" id="default"></td>

</tr>
<tr><td>Required <input type ="checkbox" name="required" value="1" id="required"></td></tr></table>
<div id="uservalidation">
<table>
<tr>
    <td>
   Type of data: <select name="datatype" id="datatype">
        <option value="float">Numeric</option>
        <option value="int">Integer</option>
        <option value="varchar">varchar</option>
        <option value="smallint">Small Int</option>
         <option value="text">Text</option>
                 
    </select>
    </td></tr>
    <tr><td>Validation:<input type="checkbox" name="validation" value="1"></td><td>size:<input type="number" id="datasize" name="datasize" id="datasize" onblur="checkint('datasize');" maxlength="4"></td></tr>
 </tr> </table>  </div>
<tr><td><input type="button" id="more" value="Add  Items" hidden="true" onclick="moreOptions();"></td></tr>
<tr><input type="text" id="count" name="count" value=0 hidden="true">
<td><input type="button" value="save"  id="save" onclick="validate();">
</tr>
</table>
    <div id="addfieldform1">
    </div>
</div>
<div id="donefields1" style="float:left" class="simple_overlay">
    <div class="details">
    <form>
        
  <fieldset id="donefields" ">
    <legend>template view:</legend>

<table>

</table>
      </div>
</div>
</form>
<div id="done">
<input type="button" value="go to home" onclick="storedata();">
<a  rel="#donefields1" style="text-decoration:none"><input type="button" value="view" hidden="true" id="view"></a>
</div>
        <div style="width:500px;" id="showitems">dassdgfadsgfdfgadsfa</div>
</body>
</html>
<script type="text/javascript">
//    $("#donefields").hide();
var counter=0;
$("#addfieldform").hide();
function showFields(){
	$("#addfieldform").show();
}
function userfields(){

	showitems();
	var label=$("#label").val();
	var defaultValue=$("#default").val();
	var select=$("#select").val();
	
	alert(select);
        if(select=="textarea"){
            alert("hiiii");
         $("#donefields").append("<tr><td><label>"+label+"</label></td><td><"+select+" row='8' col='9'></"+select+"></td></tr>");
//         $("#donefields").append("<td><"+select+" row='8' col='9'></td></tr>");
	  
        }
         else if(select=="radio"){
          var str="";
		str +="<tr><td>"+label+"</td>";
		
// 		
		
		
		alert("==="+counter);
		
		while(rlabel>counter){
                    rlabel--;
			var sopt = $("#radiolabel"+rlabel).val();
			
		str +="<td><input type='radio' id='radio"+counter+"' name='radio"+counter+"'>"+sopt+"</label></td></tr>";

		str +="<tr><td></td>";	

			
		}	
		
		str +="</tr>"
              $("#donefields").append(str);  
	   
        }
         else if(select=="listbox"){
         var strDD = "<tr><td><label>"+label+"</label></td>";
		strDD += "<td><select multiple='multiple'>";
//		$("#donefields").append("<tr><td><label>"+label+"</label></td>");
		
		
		
		alert("==="+counter);
		
		while(counter>0){
			var sopt = $("#option"+counter).val();
			strDD += "<option>"+sopt+"</option>";
		

			

			counter--;
		}	
		strDD+= "</select></td></tr>";
		$("#donefields").append(strDD);
		
	   
        }
	else if(select!="combobox"){
	$("#donefields").append("<tr><td><label>"+label+"</label></td><td><input type="+select+" value="+defaultValue+"></td></tr>");
//	$("#donefields").append("<td><input type="+select+" value="+defaultValue+"></td></tr>"); 
	}
       
	else{

		var strDD = "<tr><td><label>"+label+"</label></td>";
		strDD += "<td><select>";
//		$("#donefields").append("<tr><td><label>"+label+"</label></td>");

		
		alert("==="+counter);
		
		while(counter>0){
			var sopt = $("#option"+counter).val();
			strDD += "<option>"+sopt+"</option>";
		


			counter--;
		}	
		strDD+= "</select></td></tr>";
		$("#donefields").append(strDD);
		
	
}
	save();
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
function save(){
	$("#donefields").show();
       
		$.ajax({ 
		      type: "POST",
		      url: '../controller/abc.php',                  //the script to call to get data          
// 		      data: "fname="+arg,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		      data: $('#frmvote').serialize(),
		            
		       
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






  function validate() {
	 
	
//   alert('hiiivalidate');
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
            if($("#templateName").val()==""){
                alert('Enter template name.');
                error ="error";
                }
            
                if($("#label").val()==''){
                alert('Enter a label.');
                error ="error";
               }
               if(error=="" && $("#label").val()!=''){
            	   
                   userfields();
                   alert("good");
               }
	  	
		    }
             
	        },
	        complete: function () {
	            
	        },
	        error: function(){
	            
	        }
	   }); 
  $("#view").show();
  }
    
 function templateavail(){
	 
     	$.ajax({ 
		      type: "POST",
		      url: '../controller/templateavilavility.php',                  //the script to call to get data          
// 		      data: "fname="+arg,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
		      data: "selecttemplate="+$('#templateName').val(),
		            
		       
		        success: function(data){
// 		        $("#addfieldform").html('');
// 		        $("#addfieldform").append(data);
		    if(data==1){
                        alert("template exists");
                        $('#templateName').val("");
                    }
                    
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
//			      data: "fname="+arg,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
			      data: "selecttemplate="+$('#templateName').val()+"&field="+$("#label").val()+"&count="+$("#count").val(),
			            
			       
			        success: function(data){
//			        $("#addfieldform").html('');
//			        $("#addfieldform").append(data);
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
 function refresh(){
 window.location="master.php"
 }
 function storedata(){
 $.ajax({ 
	      type: "POST",
	      url: '../controller/createdatatable.php',                  //the script to call to get data          
//	      data: "fname="+arg,                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
	      data: "selecttemplate="+$('#templateName').val(),
	            
	       
	        success: function(data){
//	        $("#addfieldform").html('');
//	        $("#addfieldform").append(data);
	  
	        	
              window.location="../index.php";   
            
              
	        },
	        complete: function () {
	            
	        },
	        error: function(){
	            
	        }
	   }); 
	 }
	 
         function showitems(){
         var label=$("#label").val();
	var defaultValue=$("#default").val();
	var select=$("#select").val();
        $("#showitems").append(label);
         }
</script>
<script>
  $(document).ready(function() {
      $("a[rel]").overlay();
    });
  
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