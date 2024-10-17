<?php
/**
 * Class File Autoloader
 * @package Book Library
 */
spl_autoload_register('astra_book_library_autoloader');
function astra_book_library_autoloader($class) {
	$namespace = 'ASTRA_BOOK_LIBRARY';
 

	if (strpos($class, $namespace) !== 0) {
		return;
	}
 
	$class = str_replace($namespace, '', $class);
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
 
	$directory = get_template_directory();

	if(defined("ASTRA_BOOK_LIBRARY_DIR_PATH")){
		$path = ASTRA_BOOK_LIBRARY_DIR_PATH . strtolower($class);
	}

 
	if (file_exists($path)) {
		require_once($path);
	}

	return $path;
}