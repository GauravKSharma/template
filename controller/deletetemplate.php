<?php
include_once '../model/svaetemplate.php';

echo "gauav".$_REQUEST['arg'];
$a->setId($_REQUEST['arg']);
$a->deleteTemplate();

?>
