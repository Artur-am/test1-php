<?php if(false===defined('QW'))exit;

/**
 * [Description Controller_Main]
 */
class Controller_Main extends Controller
{
    public function model()
    {
        $this->model = new Model_Main();
    }
    /**
     * @return [type]
     */
    public function action_index()
    {
        $data = $this->model->get_data();
		$this->view->generate('', 'index.php', $data);
    }

    public function action_create()
    {
        $this->is_valid_ajax();

        
        
        echo json_encode(['success' => true, 'data' => $data]);
    }
}