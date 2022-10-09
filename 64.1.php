<?php
	require_once '63.1.php';

	echo '<br>___<br><br>';

	echo (new Tag('input'))->setAttr('name', 'name1')->open();
	echo (new Tag('input'))->setAttr('name', 'name2')->open();
?>
