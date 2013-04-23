<?php
include_once '../model/svaetemplate.php';
include_once '../model/dbinteraction.php';
 echo $_REQUEST['selecttemplate'];
$a->setTableName($_REQUEST['selecttemplate']);
$a->setTemplateId($_REQUEST['selecttemplate']);
$id=$a->getTemplateId();
$result=$a->fetchTemplateInfo();
$sql="create table template$id(id int auto_increment primary key,  " ;
$row=mysql_fetch_assoc($result);
if($row['datatype_size'])
$sql.=str_replace(" ", "_",$row['label'])." ". $row['datatype'] ."(".$row['datatype_size'].") ";
else 
{
	if($row['datatype']=='varchar')
		$sql.=$row['label']." ". $row['datatype'] ."(20) ";
else
$sql.=$row['label']." ". $row['datatype'];
}
while($row=mysql_fetch_assoc($result)){
	if($row['datatype_size']){
	$sql.=",".$row['label']." ". $row['datatype'] ."(".$row['datatype_size'].") ";
	}
	else
	{ 
		if($row['datatype']=='varchar')
			$sql.=$row['label']." ". $row['datatype'] ."(20) ";
		else
		$sql.=",".$row['label']." ". $row['datatype'];
	}
}
$sql.=")";
// echo $sql;die;

 $obj=mysql_query($sql);
?>