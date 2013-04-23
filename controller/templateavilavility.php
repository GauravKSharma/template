<?php

include_once '../model/svaetemplate.php';
// echo $_REQUEST['selecttemplate'];
$a->setTableName($_REQUEST['selecttemplate']);
$result=$a->fetchTemplate();

if($result){
    echo "1";
    
}
else 
    echo "0";
?>
