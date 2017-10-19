<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=skillogram_709;host=127.0.0.1';
$user = 'root';
$password = 'root';    //common.php

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('INSERT INTO post SET 
    	author_name = "' . $_POST['new_username'] . '",
    	author_avatar = "images/icon2.jpg",
    	added_at = "' . date('Y-m-d H:i:s') . '",
    	image = "images/foto2.jpg",
    	likes_count = "' . mt_rand(0,1000) . '",
    	comment = "коммент 2"
    ');

    $posts = $dbh->query("SELECT * FROM post ORDER BY id DESC")
				 ->fetchAll(PDO::FETCH_ASSOC)
    );


} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

