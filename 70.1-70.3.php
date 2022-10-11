<?php
	require_once('67.php');
	
	class ListItem extends Tag {
		public function __construct()
		{
			// Вызываем конструктор родителя, передав в качестви имени 'li':
			parent::__construct('li');
		}
	}

	class HtmlList extends Tag
	{
		private $items = [];
		
		public function addItem(ListItem $li)
		{
			$this->items[] = $li;
			return $this;
		}
		
		public function show()
		{
			$result = $this->open();
			
			foreach ($this->items as $item) {
				$result .= $item->show();
			}
			
			$result .= $this->close();
			
			return $result;
		}

		public function __toString() {
			$result = $this->show();

			return $result;
		}
	}

	class Ul extends HtmlList {
		public function __construct() {
			parent::__construct('ul');
		}
	}

	class Ol extends HtmlList {
		public function __construct() {
			parent::__construct('ol');
		}
	}

	$list = new HtmlList('ul');
	
	echo $list
		->addItem( (new ListItem())->setText('item1') )
		->addItem( (new ListItem())->setText('item2') )
		->addItem( (new ListItem())->setText('item3') );

	echo (new Ul)
		->addItem( (new ListItem())->setText('item1') )
		->addItem( (new ListItem())->setText('item2') )
		->addItem( (new ListItem())->setText('item3') );
	
	echo (new Ol)
		->addItem( (new ListItem())->setText('item1') )
		->addItem( (new ListItem())->setText('item2') )
		->addItem( (new ListItem())->setText('item3') );
	/*
		Результат выполнения кода выведет следующее:
		<ul>
			<li>item1</li>
			<li>item2</li>
			<li>item3</li>
		</ul>
	*/
?>

