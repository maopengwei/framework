<?php

namespace core\lib;

use core\lib\conf;
use Medoo\Medoo;

class medooModel extends Medoo
{
    public function __construct()
    {
        $option = conf::getAll("medoo");
        Parent::__construct($option);
    }

    public function  getThing(){}
    
}