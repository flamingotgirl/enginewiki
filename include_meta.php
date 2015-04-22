<title>MyWiki.documentation</title>

<script type="text/javascript" src="scripts/jquery-1.7.min.js"></script>
<script type="text/javascript" src="scripts/jMenu.js"></script>
<?php

	foreach ($_configArrayJS as $mainFolder => $JScripts) {
		foreach ($JScripts as $scriptFile) {
			?>
			<script type="text/javascript" src="scripts/<?php echo $mainFolder; ?>/<?php echo $scriptFile; ?>"></script>
			<?php
		}
	}

?>
<link type="text/css" rel="stylesheet" href="scripts/syntaxhighlighter/styles/shCore.css"/>
<link type="text/css" rel="stylesheet" href="scripts/syntaxhighlighter/styles/shThemeDefault.css"/>
<link type="text/css" rel="stylesheet" href="styles/iact.css" />
<link type="text/css" rel="stylesheet" href="styles/style.css" />
<link type="text/css" rel="stylesheet" href="styles/tree.css" />
<link type="text/css" rel="stylesheet" href="styles/buttons.css" />

<link rel="shortcut icon" href="styles/images/favicon.ico" />

<script type="text/javascript">
	SyntaxHighlighter.all();
	//SyntaxHighlighter.highlight();
</script>

<script type="text/javascript" src="scripts/scripts.js"></script>