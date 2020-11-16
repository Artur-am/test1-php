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

    /**
     * @return [type]
     */
    public function action_update()
    {
        $this->is_valid_ajax();

        $name = $_POST['name'];
        $value = $_POST['value'];
        $td = ['firstName','lastName','age','floor','group_id','faculty_id'];

        if(!((int)$name))
        {
            $name = htmlspecialchars(strip_tags(trim($name)));
            $value = htmlspecialchars(strip_tags(trim($value)));
            if(
                ((empty($name[2])&&!(array_key_exists($name, $td))))
            ){
                echo json_encode(['success' => false, 'data' => null]);
                exit;
            }
        }

        if(!((int)$_POST['id']))
        {
            echo json_encode(['success' => false, 'data' => null]);
            exit;
        }

        $this->model->update_user($_POST['id'], $name, $value);
        echo json_encode(['success' => true, 'data' => 7878]);
    }
}