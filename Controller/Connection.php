<?php 

namespace Controller;


//database connection
class Connection
    {
        public $connect;

        public function __construct()
        {
            $this->dbConnect();
        }
       
        public function dbConnect()
        {
            $this->connect = mysqli_connect('localhost','root','','ecommerce');
            if(mysqli_connect_error())
            {
                die(" Connect Failed ");
            }
        }
    }