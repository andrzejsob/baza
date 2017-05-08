<?php
namespace database\base;

class ApplicationRegistry extends Registry
{
    private static $instance = null;
    private $request = null;
	private $map = null;
    private $appcontroller = null;
    private $freezedir = "data";
    private $values = array();
    private $mtimes = array();

    private function __construct() {}

    static function instance()
    {
        if(is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function get($key)
    {
        $path = $this->freezedir.DIRECTORY_SEPARATOR.$key;
        if(file_exists($path)) {
            clearstatcache();
            $mtime = filemtime($path);
            if(!isset($this->mtimes[$key])) {
                $this->mtimes[$key] = 0;
            }
            echo $mtime ." < ? ". $this->mtimes[$key];
            if($mtime < $this->mtimes[$key]) {

                $data = file_get_contents($path);
                $this->mtimes[$key] = $mtime;
                return ($this->values[$key] = unserailize($data));
            }
        }
        if(isset($this->values[$key])) {
            return $this->values[$key];
        }
        return null;
    }

    protected function set($key, $val)
    {
        $this->values[$key] = $val;
        $path = $this->freezedir.DIRECTORY_SEPARATOR.$key;
        file_put_contents($path, serialize($val));
        $this->mtimes[$key] = time();
    }

    static function getDSN()
    {
        return self::instance()->get('dsn');
    }

    static function setDSN($dsn)
    {
        return self::instance()->set('dsn', $dsn);
    }

    static function getRequest()
    {
        $inst = self::instance();
        if(is_null($inst->request)) {
            $inst->request = new \woo\controller\Request();
        }
        return $inst->request;
    }

	static function setControllerMap($map)
	{
		$inst = self::instance();
		if(is_null($inst->map)) {
            $inst->map = $map;
        }
	}

    static function appController()
    {
        $inst = self::instance();
        if (is_null($inst->appcontroller)) {
            $inst->appcontroller = new \woo\controller\AppController($inst->map);
        }
        return $inst->appcontroller;
    }
}
