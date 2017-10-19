<!DOCTYPE html>
<html>
<head>
	<meta http-equiv = "Content-Type" content = "text/html" charset = "utf-8">
</head>
<body>	
<?php
echo '<img src="images/logo.jpg" align="left" width="200" height="100" style="padding-right: 5px"/>';
echo '<br/>';
echo 'Hello <b>humans</b>!!!!!';
echo 'Today is:::::';
echo '<b> <u>' . 
     date('<b>Y-m-d H:i:s<b/>', time()) . 
     '</u> </b><br/>';
?>
<hr/>
Copyright <?=date('Y');?>
</body>
</html>