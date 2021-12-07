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

        public function filtering($catName){
            $result = $this->conn->query("SELECT bp.id, bp.title, bp.content, bp.description, bp.img_link, bp.created FROM blog_post bp
            INNER JOIN blog_post_categories bpc ON bpc.blog_post_id = bp.id
            INNER JOIN category_types ct ON ct.id = bpc.category_id
            where ct.name = '$catName'");

            return $result;
            
        }

        public function update($name, $where_condition){
            $condition = '';
            $arr = [];
            foreach ($where_condition as $key => $value) {
                $condition .= $key . " = '" . $value . "' AND ";
            }
            $condition = substr($condition, 0, -5);
            $update_result = $this->con-query("SELECT * FROM " . $this->table . " WHERE " . $condition);
            foreach ($update_result as $value) {
                $arr[] = $value;
            }
            return $arr;
        }



        public function delete(){

        }
    }