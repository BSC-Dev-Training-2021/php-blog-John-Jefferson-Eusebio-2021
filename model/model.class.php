<?php
    
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
        public function findById($id){
           
            if(is_array($id)){
                
                foreach($id as $key => $value){
                    $dataColumnKeys = $key;
                    $dataColumnValues = $value;
                }
                $result = $this->conn->query("SELECT * FROM $this->table WHERE $dataColumnKeys = $dataColumnValues");
                return $result;
            }else{
                    $results = $this->conn->query("SELECT * FROM  $this->table  WHERE id= $id ");
                    foreach ($results as $value) {
                        $arrRes = $value;
                    }
                    return $arrRes;
                    
                }
            
        }

        public function filtering(){

            $result = $this->conn-query("SELECT DISTINCT * FROM blog_post bp
            INNER JOIN blog_post_categories bpc ON bpc.blog_post_id = bp.id
            INNER JOIN blog_post_comment bc ON bc.blog_post_id = bpc.blog_post_id
            INNER JOIN category_types ct ON bpc.category_id = ct.id 
            ");
            return $result;
           
        }

    }