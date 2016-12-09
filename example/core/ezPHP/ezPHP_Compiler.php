<?php

class ezPHP_Compiler {


	/*
	 *	Simple Caching - By: https://www.addedbytes.com/articles/for-beginners/output-caching-for-beginners/
	 */
	public function writeCache($_script, $_file) {
		ob_start();
		include $_script;
	    $fp = fopen($_file, 'w'); 
	    fwrite($fp, ob_get_contents());
	    fclose($fp); 
	    ob_end_flush(); 
	}

	public function readContent($_file) {
		ob_start();
		echo ob_get_contents();
	    ob_end_flush(); 
	}
}

$ezCompiler = new ezPHP_Compiler();

?>