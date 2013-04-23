<html>
    <body>
        
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

</select></td>
<tr>
<td>Field Label</td>
<td> Default Value</td>
</tr>
<tr><td><input type="text" name="label" id="label" require="required" ></td>
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
    <tr><td>Validation:<input type="checkbox" name="validation" value="1"></td><td>size:<input type="number" name="datasize"></td></tr>
    </div>
<tr><td><input type="button" id="more" value="Add  Items" hidden="true" onclick="moreOptions();"></td></tr>
<tr><input type="text" id="count" name="count" value=0 hidden="true">
<td><input type="button" value="save"  id="save" onclick="validate();">
</tr>
</table>
</body>
    </html>

