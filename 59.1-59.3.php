<?php
	class Tag
	{
		private $name; // свойство для хранения имени тега
		
		public function __construct($name) {
			$this->name = $name;
		}

		public function open() {
			return "<$this->name>";
		}

		public function close() {
			return "</$this->name>";
		}
	}

	$head = new Tag('header');
	echo $head->open().'header сайта'.$head->close();

	echo '<br>';

	$input = new Tag('input');
	echo $input->open();

	echo '<br>';

	$tag = new Tag('div');
	echo $tag->open().'text'.$tag->close();

	echo '<br>';

	$image = new Tag('img src=./testImage.png');
	echo $image->open();
?>

