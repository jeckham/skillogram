<!DOCTYPE html>
<html>
<head>
	<meta http-equiv = "Content-Type" content = "text/html" charset = "utf-8">
	<title>Мир | Социальная сеть</title>
	<link rel = "stylesheet" href = "style.css"/>
</head>
<body>		
	<div>
		<img src = "images/logo.jpg" id = "top">	

	    <ul id = "menu">
			<li> <a target = "_blank" href = "https://ria.ru/lenta/location_Sankt_Peterburg/">Лента</a> </li>
			<li> <a href = "#" onclick="document.forms.load_form.style.visibility = 'visible'; return false;">Добавить запись</a> </li>
			<li> <a target = "_blank" href = "about.php">О проекте</a> </li>
		</ul>
						
		<form id = "f1" action = "" method = "post">  
			<input id = "finding" type = "text" name = "search" placeholder = "Поиск..." value = "<?=@$_POST['search'];?>">	
			<input type = "submit" value = "OK" class = "button">
	    </form>	    
	</div>