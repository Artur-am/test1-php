<?php if(false===defined('QW'))exit;

class Sql
{
    public static function get_all_user_join()
    {
        return [ 'sql' => "SELECT _u.id, _u.firstName, _u.lastName, _u.age, _u.floor, _g.name AS group_name, _f.name AS faculty_name
            FROM (SELECT `id`, `firstName`, `lastName`, `age`, `floor`, `group_id`, `faculty_id` FROM `user`) _u
            LEFT JOIN `group` _g ON _g.id = _u.group_id
            LEFT JOIN `faculty` _f ON _f.id = _u.faculty_id
            "
        ];
    }
    public static function get_all_user()
    {
        return [ 'sql' => "SELECT `id`, `firstName`, `lastName`, `age`, `floor`, `group_id`, `faculty_id` FROM `user`"];
    }
    public static function get_all_group()
    {
        return [ 'sql' => "SELECT `id`, `name` FROM `group`"];
    }
    public static function get_all_faculty()
    {
        return [ 'sql' => "SELECT `id`, `name` FROM `faculty`"];
    }
    /**
     * @param int $id
     * @param string $tdName
     * @param string $value
     * 
     * @return [type]
     */
    public static function update_user(int $id, string $tdName, string $value)
    {
        $type = gettype($value);
        return [
            'sql' => "UPDATE `user` SET `{$tdName}` = ? WHERE `user`.`id` = {$id}",
            'values' => [ $type[0], $value ]
        ];
    }
    /**
     * @param int $ids
     * 
     * @return [type]
     */
    public function remove_users(int $id)
    {
        return [
            'sql' => "DELETE FROM `user` WHERE `id` IN ({$id})"
        ];
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
        return [
            'sql' => "INSERT INTO `user` (`id`, `firstName`, `lastName`, `age`, `floor`, `group_id`, `faculty_id`)
                VALUES
                    (NULL, ?, ?, ?, ?, ?, ?)",
            'values' => ['ssiiii',$firstName,$lastName,$age,$floor,$group,$floor]
        ];
    }
}