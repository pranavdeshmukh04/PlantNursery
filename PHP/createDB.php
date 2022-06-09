<?php
        
    class createDB
    {
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;
        
        public function __construct(
            $dbname = "Plantnursery",
            $tablename = "Plantsdb",
            $servername = "localhost",
            $username = "root",
            $password = ""
        ){
            $this ->dbname = $dbname;
            $this->tablename = $tablename;
            $this->servername = $servername;
            $this->username = $username;
            $this->password = $password;

            $this->con = mysqli_connect($servername, $username, $password);

            if (!$this->con){
                die("Connection Failed : " . mysqli_connect_error());
            }

            $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
            if(mysqli_query($this->con, $sql)){

                $this->con = mysqli_connect($servername, $username, $password, $dbname);
    
                // sql to create new table
                $sql = " CREATE TABLE IF NOT EXISTS $tablename
                                (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                 Plant_ID INT(10) NOT NULL,
                                 Plant_Name VARCHAR(50) NOT NULL,
                                 Plant_Price FLOAT,
                                 Plant_Img VARCHAR(200),
                                 Bestselling VARCHAR(10)
                                );";
    
                if (!mysqli_query($this->con, $sql)){
                    echo "Error Creating Table : " . mysqli_error($this->con);
                }
    
            }else{
                return false;
            }
        }

        public function getData(){
            $sql = "SELECT * FROM $this->tablename";
    
            $result = mysqli_query($this->con, $sql);
    
            if(mysqli_num_rows($result) > 0){
                return $result;
            }
        }
    }

    


