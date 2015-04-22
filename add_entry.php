<?php
	
	require_once("requirements.php");	
	
	$last_id = add_entry();
	$array_contents = get_entry_contents($last_id);
	$description = $array_contents['description'];
	$contents = $array_contents['contents'];
	$name = $array_contents['name'];

?>
<div id="content_<?php echo $last_id; ?>" class="rounded content_view row_render container<?php echo $last_id; ?>" style="">
	<h1>
		<?php echo $name; ?>
	</h1>
	<h2>
		<?php echo $description; ?>
	</h2>
	<?php echo $contents; ?>
</div>
