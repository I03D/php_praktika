<?php
	require_once('67.php');

	class Form extends Tag
	{
		public function __construct()
		{
			parent::__construct('form');
		}
	}

	$form = (new Form)->setAttrs(['action' => 'menu.php',
				      'method' => 'POST']);

 	echo $form->open();

	// здесь потом будут элементы формы

	echo $form->close();
?>
