<?php

//var_dump($_SERVER);
//var_dump(isset($_GET));

/*$name = 'anonym';
if (!empty($_GET['name'])) {
	$name = $_GET['name'];


} */

$name = !empty($_GET['name']) ? $_GET['name'] : 'anonym';

echo 'Hello, ' . $name . '!';

?>

<form action="" method="post">
	<input type="text" name="search" value="<?=@$_POST['search'];?>" />
<!--	<input type="text" name="search" value="<?php echo $_GET['search'];?>" -->
	<input type="submit" value="Search!" />
</form>