<?php
include_once '../model/svaetemplate.php';
echo$tempid= $_REQUEST['tempid'];
echo $_REQUEST['tempid'];
$a->setId($_REQUEST['id']);
$a->setTempid($tempid);
$a->removeField();
?>
