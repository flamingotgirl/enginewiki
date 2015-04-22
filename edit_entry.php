<?php
	
	require_once("requirements.php");
	
	if (isset($_GET["delete"]) and $_GET["delete"]=="ok") {
		delete_entry($_GET["entry_id"],$_GET['pid']);
	}
	else {
		$last_id = edit_entry();
		$array_contents = get_entry_contents($last_id);		
		$value = $array_contents;
		
		require("read_entry.php");
	}
?>