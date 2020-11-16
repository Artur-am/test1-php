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
        $this->get_groups();
        $this->get_faculty();

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
    /**
     * @return [type]
     */
    public function get_groups()
    {
        $sql = Sql::get_all_group();
        $this->data['groups'] = $this->link->select( $sql );
    }
    /**
     * @return [type]
     */
    public function get_faculty()
    {
        $sql = Sql::get_all_faculty();
        $this->data['faculty'] = $this->link->select( $sql );
    }
    /**
     * @param mixed $id
     * @param mixed $tdName
     * @param mixed $value
     * 
     * @return [type]
     */
    public function update_user($id, $tdName, $value)
    {
        $sql = Sql::update_user($id, $tdName, $value);
        return $this->link->update( $sql );
    }
}