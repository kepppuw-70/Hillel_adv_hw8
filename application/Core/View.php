<?php
namespace Application\Core;

class View {
   public function __construct() {
   	$path = __DIR__ . '/../../application/Views/loyout/default.php';
   	//$path = __DIR__ . '\..\..\application\views\loyout\default.php';
   	if (file_exists($path)) {
			require $path;
		} else {
			echo '<be>Bed' . $path . '<br>';
		}
		
	}

	public static function pageCode($path, $arrrez) {
		if (file_exists($path)) {
			require $path;
		}
		exit;
	}

}	