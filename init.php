<?php

define ('DB_NAME', 'phonebook');
define ('DB_HOST', 'localhost');
define ('DB_USER', 'root');
define ('DB_PASS', 'afghjkl');
define ('DB_TABLE', 'contacts');


define ('DIR_ROOT', dirname (__FILE__)) ;
define ('DIR_UPLOADS', build_path(DIR_ROOT, 'uploads'));
define ('DIR_CLASSES', build_path(DIR_ROOT, 'classes'));
define ('DIR_PAGES', build_path(DIR_ROOT, 'pages'));

function build_path() {
	return join (DIRECTORY_SEPARATOR, func_get_args());
	
}

function __autoload ($classname) {
	
	require_once (build_path(DIR_CLASSES, $classname .'.php'));
	
}


?>