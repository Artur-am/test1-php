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
     * @param string $host
     * @param string $login
     * @param string $password
     * @param string $name
     */
    public function __construct(string $host, string $login, string $password, string $name)
    {
        $this->_connection($host, $login, $password, $name);
    }
    public function __destruct()
    {
        $this->link->close();
    }

    /**
     * @param string $host
     * @param string $db_login
     * @param string $db_pass
     * @param string $db_name
     * 
     * @return [type]
     */
    private function _connection(string $host, string $db_login, string $db_pass, string $db_name)
    {
        
        $this->link = new mysqli($host, $db_login, $db_pass, $db_name);

        if($this->link->connect_errno){ throw new Exception("Connect failed: " . $this->link->connect_error); }
        if(!$this->link->set_charset('utf8')){ throw new Exception("Error loading character set utf8: " . $this->link->error); }
        return true;
    }
    /**
     * @param string $sql
     * 
     * @return [type]
     */
    private function _query(string $sql)
    {
        return $this->link->query($sql);
    }
    /**
     * @param string $sql
     * @param array $values
     * 
     * @return [type]
     */
    private function _prepare(string $sql, array $values)
    {
        $refs = array();

        $stmt = $this->link->prepare($sql);
        $result;

        if(0!=$this->link->errno) throw new Exception("Prepare an SQL statement for execution [{$this->link->error}]");

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
     * @param array $args
     * 
     * @return [type]
     */
    public function select(array $args)
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
     * @param array $args
     * 
     * @return [type]
     */
    public function insert(array $args)
    {
        if(empty($args['values']))
        {
            return $this->_query($args['sql']);
        }
        return $this->_prepare($args['sql'], $args['values']);
    }
    /**
     * @param array $args
     * 
     * @return [type]
     */
    public function update(array $args)
    {
        return $this->insert($args);
    }
    /**
     * @param array $args
     * 
     * @return [type]
     */
    public function delete(array $args)
    {
        return $this->insert($args);
    }
    public function request()
    {
    }
}