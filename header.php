<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Мир | Социальная сеть</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>		
	<div>
		<?php echo ("<img src=\"images/logo.jpg\" id=\"top\">"); ?>		
	    <ul id="menu">
			<li> <a target="_blank" href="http://www.yandex.ru/">Лента</a> </li>
			<li> <a target="_blank" href="http://www.rambler.ru/">Добавить запись</a> </li>
			<li> <a target="_blank" href="http://www.mail.ru/">О проекте</a> </li>
		</ul>
						
		<form id="f1" action="" method="post">  
			<input id="finding" type="text" name="search" placeholder="Поиск..." value="<?=@$_POST['search'];?>">	
			<input type="submit" value="OK" class="button">
	    </form>	    

	</div>