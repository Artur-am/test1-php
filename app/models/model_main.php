<?php if(false===defined('QW'))exit;

class Model_Main extends Model
{
    private array $data = [];
    /**
     * @return [type]
     */
    public function get_data()
    {
        $this->get_users();
        
        return $this->data;
    }

    /**
     * @return [type]
     */
    private function get_users()
    {
        $sql = Sql::get_all_user();
        $this->data['lists'] = $this->link->select( $sql );
    }
}