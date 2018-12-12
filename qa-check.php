<?php 
include 'qa-php-exchange.php';
$cat = $_POST['loolexid'];
require_once 'qa-include/qa-base.php';
require_once QA_INCLUDE_DIR.'qa-db.php';
require_once QA_INCLUDE_DIR.'qa-db-admin.php';
$idcheck = qa_db_query_sub('SELECT * FROM ^categories WHERE title="'.$cat.'"');
$array_check = qa_db_read_all_assoc($idcheck);
//print_r($array_check);

if($array_check == NULL) 
{
	$title = $cat;
	$parentid = NULL;
	$tags = "Kategorie-".$title;
	$position = NULL;
	qa_db_category_create($parentid, $title,$tags ,$position);
}
$res = qa_db_query_sub('SELECT categoryid FROM ^categories WHERE title="'.$cat.'"');
$array = qa_db_read_all_assoc($res);
//print_r($array);
$catid = $array[0]["categoryid"];
$returnarray = array ( "id" => $catid );
//print_r($categoryid);
print_r($returnarray);
//print_r("test");

//$exchange = new exchange();
$idexchange = $catid;


?>