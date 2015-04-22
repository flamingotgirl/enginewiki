<?php

	require_once("requirements.php");

?>
	<form id="form_add_section" action="#" method="post">
	<div class="row_render rounded">
		<h2>Add new section</h2>
		<div>Parent:</div>
		<div>
			<select id="section_id" name="section_id" style="width:200px"">
				<option value="0">--root--</option>
				<?php
					get_sections_recursive(); // returns global $arr, $nrcopii
					print_select_tree(0,$arr,$nrcopii);
					unset($arr,$nrcopii);
				?>
			</select>
			<input id="delsection" type="button" value="Delete section" onclick="if (confirm('Are you sure ?')) add_section('delete')" />
		</div>
		<div>Section name</div>
		<div>
			<input type="text" name="new_section" id="new_section" style="width:200px" />
		</div>
		<div class="sectionsubmit">
			<input class="submit button" type="submit" value="Add new section" onclick="add_section('add')" />
			<input class="button" type="button" value="Cancel" onclick="cancel_add()" />
		</div>
	</div>
	</form>

<script>
	function add_section(action) {
		$.post('add_section.php?actionx='+action, $("#form_add_section").serialize(),
		function(output) {
			$("#feeds").html(output);
		})
	}

	function cancel_add() {
		location.reload(true);
	}
</script>