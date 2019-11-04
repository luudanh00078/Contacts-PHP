<?php 
require_once("control-danhba.php");
if ($_SERVER['REQUEST_METHOD']=='GET') {
	
	$db_id = ($_GET['id']);
	
	if($db_id){
		delete_danhba($db_id);
	}	
	
    header("Location: ../view/contacts.php?rs=delete");
	
   }
   disconnect_db();
?>