<?php

	require_once("requirements.php");

	$_GET['entry_id'] = number_format($_GET['entry_id']);

	$array_contents = get_entry_contents($_GET['entry_id']);

	$contents = $array_contents['contents'];
	$description = $array_contents['description'];
	$type = $array_contents['type'];
	$name = $array_contents['name'];

?>
<div class="row_render rounded">
	<form id="form_<?php echo $_GET['entry_id']; ?>" method="post" onsubmit="return false;">
		<input type="hidden" value="<?php echo $section_id; ?>" name="section_id" />
		<input type="hidden" value="<?php echo $_GET['entry_id']; ?>" name="entry_id" />
		<input type="hidden" value="<?php echo $_GET['pid']; ?>" name="pid" />
		<?php
			if ($_GET['pid']==0) {
				?>
		Name:<br />
		<input type="text" name="name" value="<?php echo $name; ?>" style="width:500px" />
		<div>Type:</div>
		<div>
			<select id="type" name="type" style="width:200px">
				<option value="a" <?php if ($type=="a") echo "selected"; ?>>article</option>
				<option value="m" <?php if ($type=="m") echo "selected"; ?>>method</option>
				<option value="c" <?php if ($type=="c") echo "selected"; ?>>class</option>
			</select>
		</div>
				<?php
			}
			else {
				?>
		<input type="hidden" name="name" value="" />
				<?php
			}
		?>
		Description:<br />
		<input type="text" name="description" value="<?php echo $description; ?>" style="width:500px" />
		<br />
		Contents: <br />
		<textarea class="editor" style="display:none;" name="contents" id="textarea-<?php echo @$_GET['entry_id']; ?>" rows="45" cols="80"><?php echo $contents; ?></textarea>

		<div class="sectionsubmit">
			<input class="submit button" type="submit" value="Modify" onclick="edit(<?php echo $_GET['entry_id']; ?>)" />
			<input class="button" type="button" value="Cancel" onclick="cancel_edit(<?php echo $_GET['entry_id']; ?>)" />
		</div>
	</form>
</div>

<script type="text/javascript">
	setTimeout(function(){
		$("textarea.editor").each(function(){
			if($(this).val() == '') $(this).val('<p>&nbsp;</p>');
			$(this).ckeditor(function() { /* callback code */ });
		});
	},100);

	function cancel_edit(id) {
		var editorx = $('#form_'+id).find('textarea.editor').get(0);
		CKEDITOR.instances[$(editorx).attr('id')].destroy();
		$("#content_edit_"+id).remove();
		$("#content_"+id).show();
	}

	function edit(id) {
		$.post('edit_entry.php', $("#form_"+id).serialize(),
		function(output) {
			<?php
			if ($_GET['pid']!=0) {
				?>
				var editorx = $('#form_'+id).find('textarea.editor').get(0);
				CKEDITOR.instances[$(editorx).attr('id')].destroy();
				var currentUrl = window.location.hash.replace('#/','');
				if(currentUrl!=""){
					var urlvals = currentUrl.split('/');
					var article = urlvals[3];
					if(typeof article && article!=""){
						contentDisp(article);
					}
				}
				<?php
			}
			else {
				?>
				var editorx = $('#form_'+id).find('textarea.editor').get(0);
				CKEDITOR.instances[$(editorx).attr('id')].destroy();
				$("#content_edit_"+id).remove();
				$("#content_"+id).html(output).show();
				<?php
			}
			?>
		})
	}
</script>