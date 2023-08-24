<?php

namespace core\lib;

use core\lib\conf;

class model extends \PDO
{
    public function __construct()
    {
        $database = conf::getAll('database');
        
        try{
            parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWORD'], $options = null);
        }catch( \PDOException $e){
            p($e->getMessage());
        }
    }
}