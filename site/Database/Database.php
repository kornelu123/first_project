<?php
    require_once 'ConnectData.php';
    
        //==========================  in production ================================
 class Database
 {      

   private $db_host;
   private $db_user;
   private $db_password;
   private $db_name;
   private $connection;
   protected $sql;

    function __construct(){
        $this->connect();
    }
    
    public function connect()
    {
        include('ConnectData.php');

        $this->db_host = $host;
        $this->db_user = $username;
        $this->db_password = $password;
        $this->db_name = $dbname;

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        } catch (PDOException $pe) {
            die(" Connect Error :" . $pe->getMessage());
        }

        unset($this->db_host, $this->db_name, $this->db_password, $this->db_user);
    }

    public function select($table, $columns = '*', $where = '1=1',$sort = 'id',$order = 'ASC')
    {
        $this->sql = 'SELECT ' .$columns. ' FROM ' .$table. ' WHERE ' . $where. ' ORDER BY ' . $sort." ". $order; 

        return $this->executeQuerry($this->sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $columns, $updatecolumns)
    {
        $this->sql = 'INSERT INTO ' .$table. '(' .$columns. ') VALUES (' .$updatecolumns. ')';

        return $this->executeQuerry($this->sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updateOneColumn($table , $id, $column , $value)
    {

        $this->sql = 'UPDATE ' .$table. ' SET ' .$column. ' = "' .$value. '" WHERE id = "' .$id. '"';

        return $this->executeQuerry($this->sql);
    }

    public function update($table, $id, $update)
    {
        $this->sql = 'UPDATE ' .$table. ' SET ' .$update. ' WHERE id = "' .$id.'" ';

        return $this->executeQuerry($this->sql);
    }

    public function delete($table, $id)
    {
        $this->sql = 'DELETE FROM ' .$table. ' WHERE id = "' .$id. '"';
        var_dump($this->sql);
        return $this->executeQuerry($this->sql);
    }

    public function executeQuerry($querry)
    {
        $querry = $this->connection->prepare($querry);

        try {
            $querry->execute();
        } catch (PDOException $e) {
            return $e;
        }
        
        return $querry;
    }

    public function disconnect()
    {
        unset($db_host, $db_user, $db_password, $db_name, $connection);
        unset($sql);
        unset($this->connection);
    }

    function __destruct()
    {   
        $this->disconnect();
    }
}
?>
