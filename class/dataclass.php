<?php

    class dataclass
    {
        public $conn;
        public $message;

        public function __construct()
        {
            $this->conn=mysqli_connect("localhost","root","","studentmanagement");
        }

        public function getRow($query)
        {
            $tb=mysqli_query($this->conn,$query);
            $rw=mysqli_fetch_array($tb);
            return $rw;
        }

        public function getTable($query)
        {
            $tb=mysqli_query($this->conn,$query);
            return $tb;
        }

        public function saveRecord($query)  // record insert,update,delete
        {
            $result=mysqli_query($this->conn,$query);
            return $result;
        } 

        public function checkunique($query) 
        {
            $tb=mysqli_query($this->conn,$query);
            $rw=mysqli_fetch_array($tb);
            if($rw)  
             return false;
            else
             return true;
            
        }

     }

?>