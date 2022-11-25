
<?php
spl_autoload_register(function ($class) {
	// Sætter array med stier til klassemapper
	$paths = array("classes", "userapp");

	// Looper array og inkludere fil hvis den eksisterer
	foreach($paths as $path) {
		//echo COREROOT . $path . "/" . strtolower($class). '.php<br>';
		$file = COREROOT . $path . "/" . strtolower($class). '.php';
		if(file_exists($file)) {
			require_once $file;
		}
	}
});