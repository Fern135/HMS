<?php

namespace controllers\dbConnector;

class DbConnector{
    private $conn;
    private $server_name;
    private $user_name;
    private $pass_word;
    private $database;

    public function __construct($server_name, $user_name, $pass_word, $database)
    {
        $this->server_name = $server_name;
        $this->user_name   = $user_name;
        $this->pass_word   = $pass_word;
        $this->database   = $database;

        // Create connection
        $this->conn = mysqli_connect($this->server_name, $this->user_name, $this->pass_word, $this->database);

        // Check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        echo "Connected successfully";
       
    }

    function __destruct(){ // when the object is done being used
        mysqli_close($this->conn);
    }

    public function query($sql)
    {
        /*
            use this for the prepared statements
            i - integer
            d - double
            s - string
            b - BLOB
        */
        $data = mysqli_real_escape_string($this->conn, $sql);

        if(!mysqli_query($this->conn, $data)){
            return false;

        }else{
            return true;
        }

    }
}



