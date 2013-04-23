<?php
include_once '../model/svaetemplate.php';
 if($_REQUEST['count']){
//   	echo "hello";
//  echo $_REQUEST['field'].$_REQUEST['selecttemplate'];
$a->setLabel($_REQUEST['field']);
$a->setTemplateId($_REQUEST['selecttemplate']);
 if($a->fieldAvail())
 	echo true;
 else echo false;
 }