<?php if(false===defined('QW'))exit;

/**
 * [Description Controller]
 */
class Controller
{
    /**
     * @var [type]
     */
    public $module;
    /**
     * @var [type]
     */
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @return [type]
     */
    public function is_valid_ajax()
    {
        if(strcmp($_SESSION['token'], $_REQUEST['token']) !== 0)
        {
            echo json_encode(['success' => false, 'data' => 'error token']);
            exit;
        }
    }

}