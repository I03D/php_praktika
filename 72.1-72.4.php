<?php
	require_once('67.php');
	require_once('71.1.php');

	class Input extends Tag
	{
		public function __construct()
		{
			parent::__construct('input');
		}
		
		public function open()
		{
			$inputName = $this->getAttr('name');
			
			// Если атрибут name задан у инпута:
			if ($inputName) {
				if (isset($_REQUEST[$inputName])) {
					$value = $_REQUEST[$inputName];
					$this->setAttr('value', $value);
				}
			}
			
			return parent::open();
		}
		
		public function __toString()
		{
			return $this->open();
		}
	}

	$sum = 0;

	if (isset($_REQUEST['s1']) and $_REQUEST['s1'] != '') {
		$sum += $_REQUEST['s1'];
	}
	if (isset($_REQUEST['s2']) and $_REQUEST['s2'] != '') {
		$sum += $_REQUEST['s2'];
	}
	if (isset($_REQUEST['s3']) and $_REQUEST['s3'] != '') {
		$sum += $_REQUEST['s3'];
	}
	if (isset($_REQUEST['s4']) and $_REQUEST['s4'] != '') {
		$sum += $_REQUEST['s4'];
	}
	if (isset($_REQUEST['s5']) and $_REQUEST['s5'] != '') {
		$sum += $_REQUEST['s5'];
	}

	echo $sum;

	$form = (new Form)->setAttrs(['action' => '', 
				      'method' => 'GET']);
	
 	echo $form->open();

	echo (new Input)->setAttr('name', 's1');
	echo '<br>';
	echo (new Input)->setAttr('name', 's2');
	echo '<br>';
	echo (new Input)->setAttr('name', 's3');
	echo '<br>';
	echo (new Input)->setAttr('name', 's4');
	echo '<br>';
	echo (new Input)->setAttr('name', 's5');
	echo '<br>';
	echo (new Input)->setAttr('type', 'submit');
	echo '<br>';

	echo $form->close();
?>
