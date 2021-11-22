<?php
    require_once 'components/index.component.php';
    class model {
        var $servername = "Localhost";
        var $username = "root";
        var $password = "";
        var $db = "blog";
        private $conn;
        
        //database table
        public function __construct($table){
            $this->table = $table;
            $this->connect();
        }
        //connection
        function connect(){
            $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->db);
        }
        //insert data
        public function create($fields=[]){
            $tableColumns=[];
            $tableValues=[];
            foreach ($fields as $columnkey => $value) {
                $tableColumns[] = $columnkey;
                $tableValues [] = $value;
            }

            $query = "INSERT INTO " . $this->table . "("  . implode(', ', $tableColumns)  . ") VALUES ('" . implode("','", $tableValues) . "')";
            //var_dump($query);
            $this->conn->query($query);
            $lastid = $this->conn->insert_id;
            return $lastid;
           
        }
        
        //read all data
        public function readAll(){
            
            $query = "SELECT * FROM " . $this->table;

            $result = $this->conn->query($query);
            return $result;
        }
        //find by id
        public function findbyid($id){
           
            if(is_array($id)){
                
                foreach($id as $key => $value){
                    $dataColumnKeys = $key;
                    $dataColumnValues = $value;
                }
                $query = "SELECT * FROM $this->table WHERE $dataColumnKeys = $dataColumnValues";
                $result = $this->conn->query($query);
                return $result;
            }

                if (isset($id)) {
                    $article_id = $id;
                    $query = "SELECT * FROM " . $this->table . " WHERE id='". $id . "'";
                    $result = $this->conn->query($query);
                    return $result;
                }
            }

        

    }