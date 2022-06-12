<?php
    require_once 'ConnectData.php';
    
        //==========================  in production ================================
 class Database
 {      

   protected $db_host;
   protected $db_user;
   protected $db_password;
   protected $db_name;
   protected $connection;
   protected $queryRun;
   protected $numRows;
   protected $seldb;
   protected $sql;

// constructor
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

    public function select($table,$columns = '*',$where = '1=1',$order = 'id',$sort = 'ASC')
    {
        $this->sql = 'SELECT ' .$columns. ' FROM ' .$table. ' WHERE ' . $where. ' ORDER BY ' . $order." ". $sort; 

        return $this->executeQuerry($this->sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table,$columns,$updatecolumns)
    {
        $this->sql = 'INSERT INTO ' .$table. '(' .$columns. ') VALUES (' .$updatecolumns. ')';

        return $this->executeQuerry($this->sql)->fetchAll(PDO::FETCH_ASSOC);
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
        unset($this->connection);
    }

    function __destruct()
    {   
        $this->disconnect();
    }
}
?>
