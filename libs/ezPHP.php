<?php

class ezPHP {

	public $_vars = array();

	public $_config = array(
		'secret'	=>		'default',
		'cache'		=>		'true',
		'cache_time'=>		600,
		'minify'	=>		false,
	);

	public $_dir = array(
		'views'		=>		'/views',
		'cache'		=>		'/views/_cache'
	);

	public function __construct() {

		/*
		spl_autoload_register(function ($class) {
		    include 'plugins/' . $class . '.class.php';
		});
		*/
	}

	public function __set($name, $value) {
        $this->_vars[$name] = $value;
    }

    public function __get($name) {
        return $this->_vars[$name];
    }

	public function setConfig($array = array()) {
		foreach ($array as $k => &$v) {
			$this->_config[$k]	= $v;
		}
		return $this;
	}

	public function setDirs($array) {
		foreach($array as $k => $v) {
			$this->_dir[$k]		=		$v;
		}
		return $this;
	}

	public function getConfig($conf) {
		return $this->_config[$conf];
	}

	public function getDir($dir) {
		return $this->_dir[$dir];
	}

	public function debug() {
		return print_r($this);
	}

    /*
	 *	Simple Caching - By: https://www.addedbytes.com/articles/for-beginners/output-caching-for-beginners/
	 */

    public function render_cache($_script, $_file) {
		ob_start();
		include $_script;
	    $fp = fopen($_file, 'w'); 
	    fwrite($fp, ob_get_contents());
	    fclose($fp); 
	    ob_end_flush();
	}

	public function render($file) {
		$_local = $this->_dir['views'] . DIRECTORY_SEPARATOR . $file . '.phtml';

		if (file_exists($_local)) {
			if ($this->_config['cache'] == true) {	
				$_cache = $this->_dir['cache'] . DIRECTORY_SEPARATOR . hash('sha256', $file . $this->_config['secret']) . '.html';
				$_uri = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];

				if (file_exists($_cache) && time() - $this->_config['cache_time'] <= filemtime($_cache)) {
					clearstatcache();
					include($_cache);
				} else if (!file_exists($_cache) || time() - $this->_config['cache_time'] > filemtime($_cache)) {
					$this->render_cache($_local, $_cache);
				}
			} else { 
				require $this->_dir['views'] . DIRECTORY_SEPARATOR . $file . '.phtml';
			}
		} else throw new Exception('Template ' . $_local . ' could not be found!');
	}

}

?>