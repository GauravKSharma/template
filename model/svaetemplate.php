<?php
include_once 'dbinteraction.php';
class savetemplate{
protected $tableName;
protected $fieldType;
protected $name;
protected $value="";
protected $label;
protected $options;
protected $required;
protected $datatype;
protected $datatypeSize;
protected $validation=0;
protected $templateId;
protected $like;
protected $id;
protected $tempid;



    public function setTempid($tempid){
        $this->tempid=$tempid;
    }
    public function setLike($like){
        $this->like=$like;
    
        
    }
    public function setId($id){
        $this->id=$id;
    }

    /**
	 * @return the $templateId
	 */
	public function getTemplateId() {
		return $this->templateId;
	}

/**
	 * @param field_type $templateId
	 */
	public function setTemplateId($templateName) {
		$sql="select id from template_master where template_name='$templateName' ";
		$obj=mysql_query($sql);
		($row=mysql_fetch_assoc($obj));
		
		$this->templateId = $row['id'];
	}

	/**
	 * @return the $required
	 */
	public function getRequired() {
		return $this->required;
	}

/**
	 * @return the $datatype
	 */
	public function getDatatype() {
		return $this->datatype;
	}

/**
	 * @return the $datatypeSize
	 */
	public function getDatatypeSize() {
		return $this->datatypeSize;
	}

/**
	 * @return the $validation
	 */
	public function getValidation() {
		return $this->validation;
	}

/**
	 * @param field_type $datatype
	 */
	public function setDatatype($datatype) {
		$this->datatype = $datatype;
	}

/**
	 * @param field_type $datatypeSize
	 */
	public function setDatatypeSize($datatypeSize) {
		$this->datatypeSize = $datatypeSize;
	}

/**
	 * @param number $validation
	 */
	public function setValidation($validation) {
		$this->validation = $validation;
	}

/**
	 * @return the $tableName
	 */
public function setRequired($required) {
		$this->required = $required;
	}
        public function seDatatype($datatype) {
		$this->datatype = $datatype;
	}
	public function getTableName() {
		return $this->tableName;
	}

/**
	 * @return the $fieldType
	 */
	public function getFieldType() {
		return $this->fieldType;
	}

/**
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

/**
	 * @return the $value
	 */
	public function getValue() {
		return $this->value;
	}

/**
	 * @return the $label
	 */
	public function getLabel() {
		return $this->label;
	}

/**
	 * @return the $options
	 */
	public function getOptions() {
		return $this->options;
	}

/**
	 * @param field_type $tableName
	 */
	public function setTableName($tableName) {
		$this->tableName = $tableName;
	}

/**
	 * @param field_type $fieldType
	 */
	public function setFieldType($fieldType) {
		$this->fieldType = $fieldType;
	}

/**
	 * @param field_type $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

/**
	 * @param field_type $value
	 */
	public function setValue($value) {
		$this->value = $value;
	}

/**
	 * @param field_type $label
	 */
	public function setLabel($label) {
		$this->label = $label;
	}

/**
	 * @param field_type $options
	 */
	public function setOptions($options) {
		$this->options = $options;
	}

public function createTemplate(){
	

	
$sql="create table $this->tableName(id int auto_increment primary key,type varchar(10),name varchar(20),label varchar(40),value varchar(100),options int,required smallint(2),datatype varchar(10))";

$obj=mysql_query($sql);
}

function insertfield(){
	$table="temp3";
	$this->setTemplateId($this->tableName);

$sql="insert into field_master values('','$this->fieldType','$this->name','$this->label','$this->value','$this->options','$this->required','$this->datatype','$this->templateId','$this->datatypeSize','$this->validation')";
// echo $sql;die;
$obj=mysql_query($sql);		
}

public  function fetchTemplateInfo(){
	$this->setTemplateId($this->tableName);
	$sql="select * from field_master where template_id=$this->templateId";
//        echo $sql;die;
	$result=mysql_query($sql);
	return $result;
}
public function tables(){
	$sql="select template_name from template_master";
	$obj=mysql_query($sql);
	print_r($obj);
	return $obj;
	
}
public function insertOptions(){
    $sql="insert into options values('','$this->name','$this->options','$this->value')";
   
    $obj=mysql_query($sql);
}

public function fetchStructure(){
   $sql="select * from field_master where template_id=$this->id && label='$this->label'";
//        echo $sql;die;
	$result=mysql_query($sql);
	return $result;
}
public function master_table(){
	$sql="insert into template_master values('','$this->tableName')";
	$obj=mysql_query($sql);
}
public function fetchAll(){
	
	$sql="select * from $this->tableName";
	echo $sql;die;
	$result=mysql_query($sql);
	return $result;
}
public function searchTemplates(){
    $sql="select * from template_master where template_name like '$this->like%'";
// echo $sql;die;
    $result=mysql_query($sql);
   return $result;
}
public function deleteTemplate(){
    $sql="select * from template$this->id";
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result);
    if($row){
        echo "Template has data.Can't be deleted.";die;}
        else{
            
    $sql="delete from template_master where id=$this->id";
    mysql_query($sql);
    $sql="delete from field_master where template_id=$this->id";
    mysql_query($sql);
    $sql="drop table template$this->id";
     mysql_query($sql);
    echo "Template is deleted";
        }
}
public  function removeField(){
    $sql="select * from template$this->tempid";
    echo $sql;
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result);
    if($row){
        echo "Template has data.Can't be deleted.";die;}
        else{
//           echo $sql;die; 
    $sql="select label from field_master where id=$this->id";
    $result=mysql_query($sql);
//    print_r();die;
    $row=mysql_fetch_assoc($result);
    $sql="delete from field_master where id=$this->id";
    mysql_query($sql);
   
    $sql="alter table template".$this->tempid." drop column ".$row['label'];
//    echo $sql;die;
     mysql_query($sql) or die(mysql_errno());
//    echo $sql;die;
}}
public function getTable($table){
    $sql="select template_name from template_master where id=$table";
     $result=mysql_query($sql);
     $row= $row=mysql_fetch_assoc($result);
     $this->tableName=$row['template_name'];
    return $this->tableName;
}
public function fetchTemplate(){
// 	echo $this->tableName;
	$sql="select * from template_master where template_name ='$this->tableName'";
//     echo $sql;die;
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result);
   return $row;
}
public function fieldAvail(){
	$sql="select * from field_master where label='$this->label' and template_id=$this->templateId";
// 	echo $sql;
	$result=mysql_query($sql);
	return mysql_num_rows($result);
}
}
$a= new savetemplate();

?>