<?php

	require_once("requirements.php");

?>
<div class="row_render rounded">
	<form id="form_add_contents" method="post" onsubmit="return false;">
		<h2>Add new contents</h2>
		<div>Parent:</div>
		<div>
			<select id="section_id" name="section_id" style="width:200px">
				<option value="0">--root--</option>
				<?php
					get_sections_recursive(); // returns global $arr, $nrcopii
					print_select_tree(0,$arr,$nrcopii);
					unset($arr,$nrcopii);
				?>
			</select>
		</div>
		<div>Type:</div>
		<div>
			<select id="type" name="type" style="width:200px">
				<option value="a">article</option>
				<option value="m">method</option>
				<option value="c">class</option>
			</select>
		</div>
		<div>
			Name:
		</div>
		<div>
			<input type="text" name="name" value="<?php echo $name; ?>" style="width:500px" />
		</div>
		<div>
			Description:
		</div>
		<div>
			<input type="text" name="description" value="<?php echo $description; ?>" style="width:500px" />
		</div>
		<div>
			Contents:
		</div>
		<div>
			<textarea class="editor" style="display:none" name="contents" id="textarea" rows="15" cols="80"><?php echo $contents; ?></textarea>
		</div>
		<div class="sectionsubmit">
			<input class="submit button" type="submit" value="Add new contents" onclick="edit()" />
			<input class="button" type="button" value="Cancel" onclick="cancel_add()" />
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

	function edit(id) {
		$.post('add_entry.php', $("#form_add_contents").serialize(),
		function(output) {
			$("#feeds").html(output);
		})
	}

	function cancel_add() {
		location.reload(true);
	}
</script>