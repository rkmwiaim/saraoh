<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="en-US">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>The Parent Window [ JavaScript: Controlling a Popup Window's Parent Window ]</title>
<link href="/static/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<input type="checkbox" name="membership" id="ci" onchange="se(this)">

<?php
	$a = 1;
	echo '1'.'2';
 ?>
</body>
<script src="/static/lib/jquery.min.js"></script>
<script src="/static/lib/bootstrap/js/bootstrap.min.js"></script>
<script>
	var se = function(selected) {
		console.log($(selected).prop('checked'));
	}
</script>
</html>
