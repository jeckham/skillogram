<?php

require ('header.php'); 
require ('variable.php'); 

$t = 0;

if (!file_exists('images/photos')) {
	mkdir('images/photos', 0777, true);
}

?>

<form name = "load_form" action = "" method = "post" enctype = "multipart/form-data" id = "form">
	Введите ваше имя 
	<input type = "text" name = "new_username" class = "input" placeholder = "Ваше имя..." value = "<?=@$_POST['new_username']?>"> <br/>	
	Загрузите аватарку 
	<input type = "file" name = "avatar">  <br/>	
	Загрузите фотографию 
	<input type = "file" name = "photo">  <br/>	
	Введите комментарий 
	<input type = "text" name = "new_comment" class = "input" placeholder = "Ваш комментарий..."value = "<?=@$_POST['new_comment']?>"> <br/>	
	<input type = "submit" value = "Send"> <br/>
</form>	

<?php

function get_file($upload_file_type) {
	if (@$_FILES[$upload_file_type] && file_exists(@$_FILES[$upload_file_type]['tmp_name'])) {
		$filename = $_FILES[$upload_file_type]['name'];
		$tmp = explode('.', $filename);
		$extension = end($tmp);
		$allowed_extensions = ['png', 'jpg', 'jpeg', 'bmp', 'gif'];
		if (!in_array($extension, $allowed_extensions)) {
			die('Неправильный тип файла!');
		}
		$destination = 'images/photos/' . $upload_file_type . '.' . $extension;
		move_uploaded_file($_FILES[$upload_file_type]['tmp_name'], $destination);  
		return ($destination);  
	}
}

?>

<div id = "container">

<?php    

$destination1 = get_file('photo');
$destination2 = get_file('avatar');

if (!empty($_REQUEST['new_username']) && 
	!empty($_REQUEST['new_comment']) &&
	!empty($destination1) &&
	!empty($destination2)) {
	
		$posts[] = [
				    'author' => 
				     	[
						'username' => @$_REQUEST['new_username'],
			  			'publish_time' => 'позавчера',
			  			'avatar' => "<img src=\"$destination2\"/>",
					],
					'photo' => "<img src=\"$destination1\"/>",
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

	<img class = "icon" <?php echo ($value['author']['avatar']) 
					?> 		

   	<big> <?php echo ($value['author']['username']) 
   					?>	</big> 

   	<p class = "mark"> <?php echo ($value['author']['publish_time'])
					?>  </p>
 	<br/>
   
	<img class = "foto" <?php echo ($value['photo'])
					?> 

    <img class = "like" src = "images/like.jpg"/>

	<num><?php echo ($value['like_counter'])
					?>	</num> 

	<div class = "f2"><?php echo ($value['comment'])
					?>  </div>  	

<?php	

}

for ($i=0; $i < count($posts); $i++) { 
	file_put_contents('photos.txt', json_encode($posts[$i]['photo']));
	file_put_contents('avatars.txt', json_encode($posts[$i]['author']['avatar']));
	//var_dump(json_decode(file_get_contents('avatars.txt')));
 }

?>

</div>

<?php

if ($t === 0) {
	echo 'Извините, ничего не нашлось';
}

require ('footer.php');