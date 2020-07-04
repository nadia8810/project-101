<?php
   class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "12345678";
    private $dbname = "db_projects_101";
    private $conn ;

    function __construct(){
        
    }

    private function connection  () {
        $this->conn =  new mysqli($this->host, $this->username, $this->password, $this->dbname);
        $this->conn->set_charset("utf8");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function fetch_object($qry){
        $objects = [];
        while ($result = mysqli_fetch_object($qry)) {
            $objects[] = $result;
        }
        return $objects;
    }

    public function query ($sql){
        $this->connection();
        $results =  $this->conn->query($sql);
        $this->close();
        return $results;
    }

    public function num_rows($result) {
        return mysqli_num_rows($result);
    }

    public function query_failed () {
        return [
            "status" => false,
            "success" => false,
            "code" => 500,
            "messsage" => "query_failed"
        ];
    }

    private function close () {
        $this->conn->close();
    }

   }
?>