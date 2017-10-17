<?php

//Алексей
//Алексей Петров

function getUserName($first_name, $last_name = null) {

	return trim($first_name . ' ' . $last_name); 
	}
	


echo getUserName('Алексей');