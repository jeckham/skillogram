

<form action="" method="post">
	<input type="text" name="search" value="<?=@$_POST['search'];?>" />
<!--	<input type="text" name="search" value="<?php echo $_GET['search'];?>" -->
	<input type="submit" value="Search!" />
</form>

<?php
$like = '<img class="icon" src="<?php /images/like.jpg?>"/>';

$posts = [
	'username'     => ['Войцеховский Илья','Семенова Дарья','Алеутова Марина',],
	'publish_time' => ['три часа назад','вчера','на прошлой неделе',],
	'avatar'       => ['/images/icon1.jpg','/images/icon2.jpg','/images/icon3.jpg',],
	'photo'        => ['/images/foto1.jpg','/images/foto2.jpg','/images/foto3.jpg',],
	'like_counter' => [65,112,39,],
	'comment'      => ['Восхитительное путешествие. Единение с природой. Еще вернусь. #Норвегия #природа #поход',
	                   'Прекрасное время. Отдых. #США #природа #поездка',
	                   'Невероятные виды. Солнце. #Испания #солнце #пляж', 
	               ],
];

$t=0;

for ($i=0; $i < count($posts['username']); $i++) 
{ 
	// поиск постов
	// если передана поисковая строка и в посте она не стречается, то пропустить этот пост
	if (!empty($_REQUEST['search']) && 
		strpos($posts['username'][$i], $_REQUEST['search']) === false
		&& 
		strpos($posts['comment'][$i], $_REQUEST['search']) === false
) {
		continue;
	}

	$t++;
	echo '<li>' . ($posts['username'][$i]) . '</li>';
	echo '<li>' . ($posts['publish_time'][$i]) . '</li>';
	echo '<li>' . ($posts['avatar'][$i]) . '</li>';
	echo '<li>' . ($posts['photo'][$i]) . '</li>';
	echo '<li>' . $like . '</li>';
	echo '<li>' . ($posts['like_counter'][$i]) . '</li>';
	echo '<li>' . ($posts['comment'][$i]) . '</li>';
	echo '<br/>';
}

	

	if ($t==0) {
		echo 'Извините, ничего не нашлось';
	}
	


?>