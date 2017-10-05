<?php
#<html>
#<head>
#	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
#	<title>Мир | Социальная сеть</title>
#	<link rel="stylesheet" href="styles1.css" />
#</head>
#<body> 

require('header.php');
echo '<img src="logo.jpg" align="left" width="200" height="100" style="padding-right: 5px"/>';
echo "<br/>";
echo "Hello <b>humans</b>!!!!!";
echo "Today is:::::";

echo '<b> <u>' . 
     date('<b>Y-m-d H:i:s<b/>', time() - 60*60*24) . 
     '</u> </b><br/>';
$name='Vasya';
echo 'Hi, ' . $name . '!!!!!!!!';
require('footer.php');