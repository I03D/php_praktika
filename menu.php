<?php
	require_once('69.1-69.8.php');

	echo "<link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\">";
	echo (new Link())->setText('1.php')->setAttr('href', '1.php')->show().'<br>';
	echo (new Link())->setText('2.php')->setAttr('href', '2.php')->show().'<br>';
	echo (new Link())->setText('3.php')->setAttr('href', '3.php')->show().'<br>';
	echo (new Link())->setText('4.php')->setAttr('href', '4.php')->show().'<br>';
	echo (new Link())->setText('5.php')->setAttr('href', '5.php')->show().'<br>';

	echo '<br>';

	echo (new Link())
		->setText('myPage1')
		->setAttr('href', '/myPage1.php')
		->show().'<br>';

	echo (new Link())
		->setText('myPage2')
		->setAttr('href', '/myPage2.php')
		->show().'<br>';
?>
