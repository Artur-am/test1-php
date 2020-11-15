<?php if(false===defined('QW'))exit;

/**
 * [Description db_Mysqli]
 */
class db_Mysqli
{
    /**
     * @var [type]
     */
    private $link;

    /**
     * @param mixed $host
     * @param mixed $login
     * @param mixed $password
     * @param mixed $name
     */
    public function __construct($host, $login, $password, $name)
    {
        $this->_connection($host, $login, $password, $name);
    }
    public function __destruct()
    {
        $this->link->close();
    }

    /**
     * @param mixed $host
     * @param mixed $db_login
     * @param mixed $db_pass
     * @param mixed $db_name
     * 
     * @return [type]
     */
    private function _connection($host, $db_login, $db_pass, $db_name)
    {
        
        $this->link = new mysqli($host, $db_login, $db_pass, $db_name);

        if($this->link->connect_errno){ throw new Exception("Connect failed: " . $this->link->connect_error); }
        if(!$this->link->set_charset('utf8')){ throw new Exception("Error loading character set utf8: " . $this->link->error); }
        return true;
    }
    /**
     * @param mixed $sql
     * 
     * @return [type]
     */
    private function _query($sql)
    {
        return $this->link->query($sql);
    }
    /**
     * @param mixed $sql
     * @param mixed $values
     * 
     * @return [type]
     */
    private function _prepare($sql, $values)
    {
        $refs = array();

        $stmt = $this->link->prepare($sql);
        $result;

        if(0!=$this->link->errno) throw new ExceptionHandler("Prepare an SQL statement for execution [{$this->link->error}]", 0, 'db', __FILE__, __LINE__);

        for( $n = 0, $count = count( $values ); $n < $count; $n++ )
        {
            $refs[] = &$values[$n];
        }
        
        call_user_func_array(array($stmt, 'bind_param'), $refs );

        $stmt->execute();

        if($stmt->affected_rows > 0)
        {
            $result = empty($stmt->error);
        }
        else{
            $result = $stmt->get_result();
        }
        $stmt->close();
        return $result;
    }

    /**
     * @param mixed $args
     * 
     * @return [type]
     */
    public function select($args)
    {
        $data = array();
        $result = array();

        if(empty($args['values']))
        {
            $result = $this->_query($args['sql']);
        }
        else {
            $result = $this->_prepare($args['sql'], $args['values']);
        }

        while($row = $result->fetch_assoc())
        {
            $data[] = $row;
        }
        return $data;
    }
    /**
     * @param mixed $args
     * 
     * @return [type]
     */
    public function insert($args)
    {
        if(empty($args['values']))
        {
            return $this->_query($args['sql']);
        }
        return $this->_prepare($args['sql'], $args['values']);
    }
    public function update(){}
    public function delete(){}
    public function request()
    {
    }
}