<?php
include_once '../model/svaetemplate.php';

//echo $_POST["templateName"];
$a->setTableName($_POST["templateName"]);
$a->setTemplateId($_POST["templateName"]);
if($_POST['count']==0){
$a->master_table();
}

	$name=$_REQUEST['fieldtype'].$_POST['count'];
	$a->setLabel($_POST['label']);
	$a->setFieldType($_POST["fieldtype"]);
	$a->setName($name);
	if(isset($_POST['defaultvalue']))
	$a->setValue($_POST['defaultvalue']);
	if(isset($_POST['required']))
	$a->setRequired($_POST['required']);
	$a->setDatatype($_POST['datatype']);
	if(isset($_POST['validation']))
	$a->setValidation($_POST['validation']);
	
	if(isset($_POST['datasize']))
		$a->setDatatypeSize($_POST['datasize']);
	if(($_POST["fieldtype"])=="listbox" || ($_POST["fieldtype"])=="combobox" || ($_POST["fieldtype"])=="radio")
	{
            $a->setDatatype('varchar');
	$b="";
        $c=(count($_REQUEST['option']))-1;
        
        echo $c;
        for($i=0;$i<$c;$i++){
            
            $b.=$_REQUEST['option'][$i]."|";
           
          
        }
        $b.=$_REQUEST['option'][$c];
//         echo $b;die;
        $a->setOptions($b);
        }
	
                $a->insertfield();
	
	
	
echo "hiiii";
?>