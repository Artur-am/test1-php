<?php if(false===defined('QW'))exit;

/**
 * [Description Module]
 */
class Model
{
    /**
     * @var [type]
     */
    public $link;

    public $sql;

    public function __construct()
    {
        $this->link = new db_Mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $this->sql = new Sql();
    }
}