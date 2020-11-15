<?php if(false===defined('QW'))exit;

class Sql
{
    public static function get_all_user()
    {
        return [ 'sql' => "SELECT _u.id, _u.firstName, _u.lastName, _u.age, _u.floor, _g.name AS group_name, _f.name AS faculty_name
            FROM (SELECT `id`, `firstName`, `lastName`, `age`, `floor`, `group_id`, `faculty_id` FROM `user`) _u
            LEFT JOIN `group` _g ON _g.id = _u.group_id
            LEFT JOIN `faculty` _f ON _f.id = _u.faculty_id
            "
        ];
    }
}