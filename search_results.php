<?php
	
	require_once("requirements.php");

	if ($_REQUEST['search']) {
		$array = search();
		$_pagetitle = '<h1>Search results for '.$_REQUEST['search'].'</h1>';
	}
	else {
		$array = get_entries("m");
		$_pagetitle = '<h1>All methods</h1>';
	}
	
	echo $_pagetitle;
	
	if (is_array($array)) foreach ($array as $entry=>$value) {
		if ($value['pid']!=0) $link_id = $value['pid']; else $link_id=$value['id'];
		?>
		<div id="content_<?php echo $value['id']; ?>" class="rounded content_view row_render container<?php echo $value['id']; ?>" style="">
			<h2>
				<a href='#/s/<?php echo $value["section_id"]; ?>/a/<?php echo $link_id; ?>' onclick='contentDisp("<?php echo $link_id; ?>")'><?php echo $value["name"]; ?></a>
			</h2>
			<?php echo $value["description"]; ?>
		</div>
		<?php
	}
?>