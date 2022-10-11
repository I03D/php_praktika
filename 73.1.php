<?php
	require_once('72.1-72.4.php');

	echo '___<br><br>';

	class Submit extends Input
	{
		public function __construct()
		{
			$this->setAttr('type', 'submit');
			parent::__construct();
		}
	}

	$form = (new Form)->setAttrs(['action' => 'tes
		t.php', 'method' => 'GET']);

 	echo $form->open();
		echo (new Input)->setAttr('name', 'year');
		echo new Submit;
	echo $form->close();
?>
