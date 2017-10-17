<!DOCTYPE html>
<?php
require ('header.php'); 
$like = '<img class=\"icon\" src=\"images/like.jpg\"/>';
$posts = [
			[ 	'author' => 
	      			[
	      			'username' => 'Войцеховский Илья',
	      			'publish_time' => 'на прошлой неделе',
	      			'avatar' => "<img class=\"icon\" src=\"images/icon1.jpg\"/>",
	      		],
		 	 	'photo' => "<img class=\"foto\" src=\"images/foto1.jpeg\"/>",
		  	 	'like_counter' => "<num>65</num>", 
		 	 	'comment' => "<div class=\"f2\">Восхитительное путешествие. Единение с природой. Еще вернусь. <u>#Норвегия</u> <u>#природа</u> <u>#поход</u></div>",
		],
			[   'author' => 
	   	   			[
	   	   			'username' => 'Соловьева Дарья',
	   	   			'publish_time' => 'три часа назад',
	   	   			'avatar' => "<img class=\"icon\" src=\"images/icon2.jpg\"/>",
	   	   		],
			  	'photo' => "<img class=\"foto\" src=\"images/foto2.jpg\"/>",
			  	'like_counter' => "<num>112</num>", 
			  	'comment' => "<div class=\"f2\">Прекрасное время. Отдых. <u>#США</u> <u>#природа</u> <u>#поездка</u></div>",
		],
			[   'author' => 
	      			[
	      			'username' => 'Алеутова Марина',
	      			'publish_time' => 'вчера',
	      			'avatar' => "<img class=\"icon\" src=\"images/icon3.jpg\"/>",
	      		],
		  		'photo' => "<img class=\"foto\" src=\"images/foto3.jpg\"/>",
		  		'like_counter' => "<num>39</num>", 
		  		'comment' => "<div class=\"f2\">Невероятные виды. Солнце. <u>#Испания</u> <u>#море</u> <u>#пляж</u></div>",
		],
];

$t=0;
?>
<div id="container">

<form style="text-align: center;">
			<input type="text" name="new_username" placeholder="Ваше имя..." value="<?=@$_POST['new_username']?>"> <br/>	
			<input type="text" name="new_avatar" placeholder="Ваша аватарка..." value="<?=@$_POST['new_avatar']?>"> <br/>	
			<input type="text" name="new_photo" placeholder="Ваша фотография..." value="<?=@$_POST['new_photo']?>"> <br/>	
			<input type="text" name="new_comment" placeholder="Ваш комментарий..." value="<?=@$_POST['new_comment']?>"> <br/>	
			<input type="submit" value="Send" style="margin-left: -4px"><br/>
	    </form>	
	    
	<?php    

if (!empty($_REQUEST['new_username']) && !empty($_REQUEST['new_avatar']) && !empty($_REQUEST['new_photo']) && !empty($_REQUEST['new_comment'])) 
 {
    $newph   = $_REQUEST['new_photo'];
    $newava  = $_REQUEST['new_avatar'];
    $newcomm = $_REQUEST['new_comment'];

	$posts['3']['author']['username']     = @$_REQUEST['new_username'];
	$posts['3']['author']['publish_time'] = 'позавчера';
	$posts['3']['author']['avatar']       = "<img class=\"icon\" src=\"$newava\"/>";  //https://static.hypercomments.com/data/avatars/1954324/avatar
	$posts['3']['photo']                  = "<img class=\"foto\" src=\"$newph\"/>";
	                                                                      //https://im0-tub-ru.yandex.net/i?id=018e0e32ec427050332a740978c9bdf0&n=13
	$posts['3']['like_counter']           = "<num>14</num>";
	$posts['3']['comment']                = "<div class=\"f2\">$newcomm</div>";
}


  foreach ($posts as $value)  
{ 
	// поиск постов
	// если передана поисковая строка и в посте она не встречается, то пропустить этот пост
	if (!empty($_REQUEST['search']) && 
		strpos($value['author']['username'], $_REQUEST['search']) === false
		&& 
		strpos($value['comment'], $_REQUEST['search']) === false
) {
		continue;
	}

	$t++;

			echo ($value['author']['avatar']);?>
	       	<big><?php echo ($value['author']['username']);?></big> 
	       	<p class="mark"> <?php echo ($value['author']['publish_time']);?></p>
	     	<br/>

	        
			<?php echo ($value['photo']); ?>
			<br/>

		    
			<?php echo ("<img class=\"like\" src=\"images/like.jpg\";/>"); 
				  echo ($value['like_counter']); 
	  		      echo ($value['comment']); 	  		      
}
	if ($t===0) {
		echo 'Извините, ничего не нашлось';
	}

require ('footer.php');
?>