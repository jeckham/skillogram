<?php

require ('header.php'); 
require ('variable.php'); 

$i = 0;

if (!file_exists('images/photos')) {
	mkdir('images/photos', 0777, true);
}

?>

<form name = "load_form" action = "" method = "post" enctype = "multipart/form-data" id = "form">
	Введите ваше имя 
	<input type = "text" name = "new_username" class = "input" placeholder = "Ваше имя..." value = "<?=@$_POST['new_username']?>"> <br/>	
	Загрузите аватарку 
	<input type = "file" name="avatar">  <br/>	
	Загрузите фотографию 
	<input type = "file" name="photo">  <br/>	
	Введите комментарий 
	<input type = "text" name="new_comment" class = "input" placeholder = "Ваш комментарий..."value = "<?=@$_POST['new_comment']?>"> <br/>	
	<input type = "submit" value = "Send"> <br/>
</form>	

<?php

function upload_file($upload_file_type) {
	if (@$_FILES[$upload_file_type] && file_exists(@$_FILES[$upload_file_type]['tmp_name'])) {
		$filename = $_FILES[$upload_file_type]['name'];
		$tmp = explode('.', $filename);
		$extension = end($tmp);
		$allowed_extensions = ['png', 'jpg', 'jpeg', 'bmp', 'gif'];
		if (!in_array($extension, $allowed_extensions)) {
			return false;
		}

		$destination = 'images/photos/' . $upload_file_type . '.' . $extension;
		//insert into
		move_uploaded_file($_FILES[$upload_file_type]['tmp_name'], $destination);  

		return ($destination);  
	}
}

?>

<?php if (!empty($_GET['error']) && $_GET['error'] == 'bad_format'): ?>
	Неправильный формат файла
<?php endif ?>

<div id = "container">

<?php    

// Load posts

if (!empty($_FILES)) {
	if (!upload_file('photo') || !upload_file('avatar')) {
		header('Location: index.php?error=bad_format');
	} else {
		// Add post 
		// Save array into file

		header('Location: index.php?success=1');
	}
	die;
}


if (!empty($_REQUEST['new_username']) && !empty($_REQUEST['new_comment'])) {
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

	$i++;

	?>

	<img class = "icon" src="<?php echo ($value['author']['avatar']) ?>" />

   	<big> <?php echo ($value['author']['username']) ?> </big> 

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
	file_put_contents('posts.txt', json_encode($posts));
	//var_dump(json_decode(file_get_contents('avatars.txt')));
}

?>

</div>

<?php

if ($i === 0) {
	echo 'Извините, ничего не нашлось';
}

require ('footer.php');