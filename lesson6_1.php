<?php

$date = date('H:i:s');

file_put_contents('date.txt', $date, FILE_APPEND | LOCK_EX);

define ('DAY_MONDAY', 1);
define ('DAY_TUESDAY', 2);
define ('DAY_WEDNESDAY', 4);

$schedule = 5; // 1+4   // $schedule = DAY_TUESDAY | DAY_WEDNESDAY

if ($schedule & DAY_MONDAY) {    //проверка, что работает в пн
	# code...
}
