<?php

use boctulus\TolScraper\core\libs\Users;
use boctulus\TolScraper\core\libs\Strings;
use boctulus\TolScraper\libs\TutorLMSWooSubsAutomation;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (php_sapi_name() != "cli"){
	return; 
}

require_once __DIR__ . '/app.php';

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', realpath(__DIR__ . '/../../..') . DIRECTORY_SEPARATOR);

	require_once ABSPATH . '/wp-config.php';
	require_once ABSPATH .'/wp-load.php';
}


///////////////////////////////////////////////////

if (php_sapi_name() == "cli"){
	$file = $argv[0];

	if (Strings::contains('/', $file)){
		$dir = Strings::beforeLast($file, '/');
		chdir($dir);
	}
}

///////////////////////////////////////////////////


/// CODIGO ...

