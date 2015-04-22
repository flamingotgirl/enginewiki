<?php
	
	require_once("requirements.php");
	
	$array = get_entries_for_parent($_REQUEST['section_id']);
	$section_id = $_REQUEST['section_id'];
	
	?>
	<h1><?php echo get_section_name($_REQUEST['section_id']); ?></h1>
	<?php
	$is_first = true;
	if (is_array($array)) foreach ($array as $entry_id=>$value) {
		
		?>
		<div id="content_<?php echo $value['id']; ?>" class="rounded content_view row_render container<?php echo $entry_id; ?>" style="">
			<h2>
				<a href='#/s/<?php echo $_REQUEST['section_id']; ?>/a/<?php echo $entry_id; ?>' onclick='contentDisp("<?php echo $entry_id; ?>")'><?php echo $value["name"]; ?></a>
			</h2>
			
			<?php echo $value["description"]; ?>
			
		</div>
		<?php
		
	}
?>
<script type="text/javascript">
    SyntaxHighlighter.highlight();
</script>