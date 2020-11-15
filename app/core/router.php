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
    }
    /**
     * @param mixed $path
     * @param mixed $message
     * 
     * @return [type]
     */
    private function _req($path, $message)
    {
        if(false===is_file($path))
        {
            throw new Exception($message ."\n path: <b>{$path}</b>");
        }
        require_once $path;
    }
}