<?php
	require_once('67.php');

	class Link extends Tag {
		const activeClass = 'active';

		public function __construct() {
			$this->setAttr('href', '');
			parent::__construct('a');
		}

		// Переопределяем метод родителя:
		public function open() {
			$this->activateSelf(); // вызываем активацию
			return parent::open(); // вызываем метод родителя
		}

		private function activateSelf() {
			if ($this->getAttr('href') == $_SERVER['REQUEST_URI']) {
				$this->addClass(self::activeClass);
			}
		}
	}

	// Дополнительные задания в menu.php.
?>
