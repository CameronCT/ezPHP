<?php

class ezPHP {

	protected $_vars = array();

	protected $_page = array();

	protected $_config = array(
		'secret'	=>		'default',
		'cache'		=>		'true',
		'cache_time'=>		600,
		'minify'	=>		false,
	);

	protected $_dir = array(
		'views'		=>		'/views',
		'cache'		=>		'/views/_cache',
	);

	public function __construct($secret = 'default') {
		if ($secret == 'default')
			throw new Exception('In order to use ezPHP, you must change the secret key!');
		else
			$this->_config['secret'] = $secret;

		spl_autoload_register(function ($class) {
		    include 'plugins/' . $class . '.class.php';
		});
	}
	
	public function __set($name, $value) {
        $this->_vars[$name] = $value;
    }
    
    public function assign($name, $value) {
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
	 *	PAGE SETTINGS
	 */
	public function title($value) {
		return $this->_vars['title']	= $value;
	}

	/*
     *	TEMPLATE BLOCKS by CameronCT
	 *	Simple Caching - By: https://www.addedbytes.com/articles/for-beginners/output-caching-for-beginners/
	 */
	public function blockStart($id) {
		return $this;
	}

	public function blockEnd($id) {
		return $this;
	}

	public function blockExtend($id, $view) {
		return $this;
	}

    /*
     *	PHP TEMPLATING ENGINE by CameronCT
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

		if ($this->_config['minify'] == true)
			Minify::init();

		if (file_exists($_local)) {
			if ($this->_config['cache'] == true) {	

				if (!session_id())
					session_regenerate_id();

				if (class_exists('RemoteAddress'))
					$ip = RemoteAddress::getIpAddress();
				else
					$ip = $_SERVER['REMOTE_ADDR'];

				if (!isset($_SESSION['sessID']))
					$_SESSION['sessID']		=		hash('sha256', $ip . session_id() . $this->_config['secret']);

				$_cache = $this->_dir['cache'] . DIRECTORY_SEPARATOR . $file . '.' . hash('sha256', $_SESSION['sessID'] . $this->_config['secret']) . '.php';

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