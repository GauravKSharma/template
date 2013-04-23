
<?php
include_once '../model/svaetemplate.php';
include_once '../model/dbinteraction.php';
 echo $_REQUEST['id'];
$a->setId($_REQUEST['id']);
$a->setLabel($_REQUEST['label']);
//$a->setTemplateId($_REQUEST['selecttemplate']);
$id=$_REQUEST['id'];
$result=$a->fetchStructure();
$sql="alter table  template$id add column   " ;
$row=mysql_fetch_assoc($result);
if($row['datatype_size'])
$sql.=$row['label']." ". $row['datatype'] ."(".$row['datatype_size'].") ";
else 
$sql.=$row['label']." ". $row['datatype'];
//$sql.=")";
echo $sql;

 $obj=mysql_query($sql) or die(mysql_error());
?>