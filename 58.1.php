<?php
	interface iFile
	{
		public function __construct($filePath);
		
		public function getPath(); // путь к файлу
		public function getDir();  // папка файла
		public function getName(); // имя файла
		public function getExt();  // расширение файла
		public function getSize(); // размер файла
		
		public function getText();          // получает текст файла
		public function setText($text);     // устанавливает текст файла
		public function appendText($text);  // добавляет текст в конец файла
		
		public function copy($copyPath);    // копирует файл
		public function delete();           // удаляет файл
		public function rename($newName);   // переименовывает файл
		public function replace($newPath);  // перемещает файл
	}

	class File implements iFile {
		public function __construct($filePath = '') {
			if ($filePath != '') {
				$this->path = "./$filePath";
				
				if (!file_exists($filePath)) {
					file_put_contents($filePath, '');
				}
			}
		}

		public function getPath() {
			return $this->path;
		}

		public function getDir() {
			return dirname($this->path);
		}

		public function getName() {
			return basename($this->name);
		}

		public function getExt() {
			return pathinfo($this->path, PATHINFO_EXTENSION);
		}

		public function getSize() {
			return filesize($this->file);
		}

		public function getText() {
			return file_get_contents($this->path);
		}

		public function setText($text) {
			unlink($this->path);
			return file_put_contents($this->path);
		}

		public function appendText($text) {
			return file_put_contents($this->path);
		}

		public function copy($copyPath) {
			copy($this->path, $copyPath);
		}

		public function delete() {
			unlink($this->path);
		}

		public function rename($newName) {
			rename($this->path, "./$newName");

			// Аргумент - не путь!!!
		}
		
		public function replace($newPath) {
			rename($this->path, $newPath);
		}
	}

	$php = new File('phpText.txt');
	echo $php->getDir().'<br>';
	echo $php->getExt().'<br>';
?>

