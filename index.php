<?php
require ('header.php'); 
require ('variable.php'); 

$t = 0;

?>

<form action="" method="post" class="f3">
	<input type="text" name="new_username" placeholder="Ваше имя..." value="<?=@$_POST['new_username']?>"> <br/>	
	<input type="text" name="new_avatar" placeholder="Ваша аватарка..." value="<?=@$_POST['new_avatar']?>"> <br/>	
	<input type="text" name="new_photo" placeholder="Ваша фотография..." value="<?=@$_POST['new_photo']?>"> <br/>	
	<input type="text" name="new_comment" placeholder="Ваш комментарий..." value="<?=@$_POST['new_comment']?>"> <br/>	
	<input type="submit" value="Send"> <br/>
</form>	

<div id="container">

<?php    

if (!empty($_REQUEST['new_username']) && 
	!empty($_REQUEST['new_avatar']) && 
	!empty($_REQUEST['new_photo']) && 
	!empty($_REQUEST['new_comment'])) {
	
		$posts[] = [
				    'author' => 
				     	[
							'username' => @$_REQUEST['new_username'],
				  			'publish_time' => 'позавчера',
				  			'avatar' => @$_REQUEST['new_avatar'],
					],
					'photo' => @$_REQUEST['new_photo'],
				 	'like_counter' => 14, 
				 	'comment' => @$_REQUEST['new_comment'],
				];

}

foreach ($posts as $value) { 

	if (!empty($_REQUEST['search']) 
		&& 
		strpos($value['author']['username'], $_REQUEST['search']) === false
		&& 
		strpos($value['comment'], $_REQUEST['search']) === false
	) {
		continue;
	}

	$t++;

?>

	<img class="icon" <?php echo ($value['author']['avatar']) 
					?> 	

   	<big> <?php echo ($value['author']['username'])?> </big> 

   	<p class="mark"> <?php echo ($value['author']['publish_time']);
					?> 
   	</p>

 	<br/>
   


	<img class="foto" <?php echo ($value['photo'])
					?>  

    <img class="like" src="images/like.jpg"/>
	<num><?php echo ($value['like_counter'])
					?>		
	</num> 

	<div class="f2"><?php echo ($value['comment'])
					?>
	</div>  	

<?php	

}

?>

</div>

<?php

if ($t === 0) {
	echo 'Извините, ничего не нашлось';
}

require ('footer.php');