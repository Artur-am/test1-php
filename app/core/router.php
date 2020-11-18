<?php if(false===defined('QW'))exit;

/**
 * [Description Router]
 */
class Router
{
    /**
     * @return [type]
     */
    public function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        $controller_name = empty($routes[1]) ? 'Main' : $routes[1];
        $action_name = empty($routes[2]) ? 'index' : $routes[2];

		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        $this->_req(PATH_MODULES . $model_name . '.php', 'Could not find module');
        $this->_req(PATH_CONTROLLERS . $controller_name . '.php', 'Could not find controller');

        $controller = new $controller_name;
		$action = $action_name;
		$controller->model();
		if(method_exists($controller, $action))
		{
			$controller->$action();
		}
		else
		{
            self::ErrorPage404();
		}
    }
    /**
     * @param string $path
     * @param string $message
     * 
     * @return [type]
     */
    private function _req(string $path, string $message)
    {
        $path = strtolower($path);
        if(false===is_file($path))
        {
            self::ErrorPage404();
            // throw new Exception($message ."\n path: <b>{$path}</b>");
        }
        require_once $path;
    }
    /**
     * @return [type]
     */
    public static function ErrorPage404()
    {
        $host = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
        header('Location:'.$host.'404.html');
        exit;
    }
}