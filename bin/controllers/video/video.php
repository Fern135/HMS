<?php

namespace controllers\video;

use controllers\DbConnector;


class video{
    private $DB_CON;
    
    function __construct(){
        $this->DB_CON = new DbConnector();
        
    }

    function __destruct(){

    }
}