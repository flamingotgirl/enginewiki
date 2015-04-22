<div id="content_<?php echo $value['id']; ?>" class="rounded content_view row_render container<?php echo $value['id']; ?>">
	<div class="description">
		<a href="javascript:;" class="darker moz_round right small" onclick="formdeleteDisp(<?php echo $value['id']; ?>,<?php echo $value['pid']; ?>)">X</a>
		<a href="javascript:;" class="darker moz_round right small mag_right" onclick="formeditDisp(<?php echo $value['id']; ?>,<?php echo $value['pid']; ?>)">EDIT</a>
		<?php echo $value["description"]; ?>
	</div>
	<?php echo $value["contents"]; ?>
</div>