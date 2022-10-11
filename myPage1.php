<?php
	require_once('menu.php');

	echo 'Вы на странице "myPage1.php"!!!<br>';
	echo (new Link())->setText('Вернуться в меню.php')
		  ->setAttr('href', 'menu.php')
		  ->show().'<br>';
