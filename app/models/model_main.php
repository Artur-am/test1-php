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
        $this->data['title'] = 'Home';

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
     * @param int $id
     * @param string $tdName
     * @param mixed $value
     * 
     * @return [type]
     */
    public function update_user(int $id, string $tdName, $value)
    {
        $sql = Sql::update_user($id, $tdName, $value);
        return $this->link->update( $sql );
    }

    /**
     * @param int $ids
     * 
     * @return [type]
     */
    public function remove_users(int $id)
    {
        $sql = $this->sql->remove_users($id);
        return $this->link->delete( $sql );
    }
    /**
     * @param string $firstName
     * @param string $lastName
     * @param int $age
     * @param int $floor
     * @param int $group
     * @param int $faculty
     * 
     * @return [type]
     */
    public function create_user(string $firstName,string $lastName,int $age,int $floor,int $group,int $faculty)
    {
        $sql = $this->sql->create_user($firstName,$lastName,$age,$floor,$group,$faculty);
        return $this->link->insert($sql);
    }
}