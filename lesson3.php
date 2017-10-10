<?php
//$count=(float)"18.76";
//var_dump($count);
$students = [
	"Sergey",
	"Mikhail",
	"Iv" . "an",
];
$students[] = 'Vasisualiy';
var_dump($students);
echo count($students); 
echo '<br/>';

for ($i = 0; $i < count($students); $i++) {

	echo '<li>' . $students[$i] . '</li>';
	break;
}

echo '<br/>'; 

foreach ($students as $key => $value) {
	echo '<li>' . $key . ' = ' . $value . '</li>';
}

echo '<br/>'; 

$date = date('Hi');
echo $date;
$date+=300;
if ($date < 2145) {
	echo ('Идет занятие');
} elseif ($date <2200) {
	echo 'Занятие заканчивается';
} else {
	echo 'Все ушли';
}

//Associative array (hash)
$student = [
	'name' => "Evgeniy",
	'age'  => "29",
	'city' =>"Saint-P",
	'colors' => 
		[
			0 => 'yellow', 
			1 => 'pink', 
			2 => 'blue'],
	];
$post = [
	'author' => 
	[
		'username' => 'Войцеховский Илья',
		'avatar' => '/images/icon1.jpg', 
		'last_seen' => 894798375843,
	],
	'photo_url' => '/images/foto1.jpg',
	'like_counter' => 65,
	'comment' => 'Восхитительное путешествие. Единение с природой. Еще вернусь.', 
	'hashtags' => ['<u>#Норвегия</u>', '<u>#природа</u>', '<u>#поход</u>'],

];

echo 'Username: ' . $post['author']['username'] . '<br/>';
echo 'Last_seen: ' . date('Y-m-d H:i:s', $post['author']['last_seen']) . '<br/>';


echo '<br/>';
/*
print_r($students);
echo '<br/>';

echo '<li>' . $students[0] . '</li>';
echo '<li>' . $students[1] . '</li>';
echo '<li>' . $students[2] . '</li>';
echo '<br/>';
*/

?>
	<li>Kisa</li>
	<li>Ostap</li>