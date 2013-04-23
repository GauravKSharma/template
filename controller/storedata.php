<?php
include_once '../model/svaetemplate.php';
include_once '../model/dbinteraction.php';
$b='tempid';
 echo $a->setId($_REQUEST['tempid']);
 $temp=$a->getTable($_REQUEST['tempid']);
$result=$a->fetchTemplateInfo();
$id=$_REQUEST['tempid'];
$sql="insert into template$id values(''";

while($row=mysql_fetch_assoc($result)){
	$sql.=",  '". $_REQUEST[$row['name']]."'";
}
$sql.=")";
// echo $sql;die;
$obj=mysql_query($sql);

header("location:../view/viewtemplate.php?id=$id&msg=1");
?>