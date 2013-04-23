<?php
//$_REQUEST['like']="a";
include_once '../model/svaetemplate.php';
if($_REQUEST['like']=='')
    echo "";
else{
$a->setLike($_REQUEST['like']);
$result=$a->searchTemplates();
$i=1;
$templates="";
while($row=  mysql_fetch_assoc($result)){
//print_r($row['template_name']);
    $templates.="<tr><td>".$i."</td>";
  $templates.="<td>".$row['template_name']."<td>";
  $templates.="<td><a href='view/showtemplate.php?id=".$row['id']."'>Edit</a></td><td><input type='button' value='DELETE' onclick='remove(".$row['id'].")'></td><td><a href='view/viewtemplate.php?id=".$row['id']."'>Go to template</a></td></tr>";
  $i++;
}
if($templates==''){
    $templates="No Result Found";
}
echo $templates;
}
?>
