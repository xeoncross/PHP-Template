<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title><?php print $title; ?></title>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" media="all" href="style.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<?php print $this->block('head.javascript'); ?>

</head>
<body lang="en">

<?php print $this->block('content'); ?>

<?php print $this->load('footer'); ?>

</body>
</html>
