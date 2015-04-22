<?php
	require_once("requirements.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	require_once("include_meta.php");
?>
</head>
<body>

	<div id="title">
		<h1>MyWiki.documentation</h1>
	</div>


	<div id="searchform">

		<form action="" method="post" onsubmit="return false;" style="margin:0; padding:0;">
			<input type="hidden" id="actionx" name="actionx" value="" />
			<div style="width:250px;" class="left" >
				<input class="button" type="button" value="+ Section" onclick="formaddsectionDisp()" />
				<input class="button" type="button" value="+ Contents" onclick="formaddcontentsDisp()" />
			</div>
			<div class="left">
				<input class="input moz_round_round" title="Search" name="search" type="text" id="suggestBox" style="width:300px;" onkeyup="searchDisp(event);" />
				<!--<input class="button" type="submit" name="actionx" value="Search" />-->
			</div>

			<div class="clear"><!-- empty --></div>
		</form>

		<div class="clear"><!-- empty --></div>

	</div>



	<table id="maintable">
		<tr>
			<td class="tmenu">
				<div class='tree'>
					<ul>
						<li><span class='expand_all'>+ ALL</span></li>
						<?php						
							get_sections_recursive(); // returns global $arr, $nrcopii
							print_menu_tree(0,$arr,$nrcopii);
							unset($arr,$nrcopii);
						?>
					</ul>
				</div>
			</td>
			<td class="tcontents">
				<div id="feeds"></div>
			</td>
		</tr>
	</table>


	<script type="text/javascript">
		displayContentsByURL();
	</script>


</body>
</html>