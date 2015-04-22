<?php

	require_once("requirements.php");

	$array = get_entry($_REQUEST['entry_id']);
	$section_id = get_section_id($_REQUEST['entry_id']);
	
	if (is_array($array)) {
	foreach ($array as $entry=>$value) {
		if ($value['pid']=='0') {
			echo '<h1>'.ucfirst($value['name']).'</h1>';
		}
		require("read_entry.php");
	}

?>
<div id="content_0">
	<a href="javascript:;" onclick="formaddDisp(<?php echo $value['id']; ?>)" class="darker moz_round">+ Add additional content box</a>
</div>
<script type="text/javascript">
    SyntaxHighlighter.highlight();
</script>
<?php
	}
	
?>