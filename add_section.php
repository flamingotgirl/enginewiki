<?php
	
	require_once("requirements.php");	
	
	$actionx = $_GET["actionx"];
	switch ($actionx) {
		case "add" : {
			add_section();
		} break;
		case "delete" : {
			delete_section($_POST['section_id']);
		} break;
	}
	
	require_once("form_add_new_section.php");
?>