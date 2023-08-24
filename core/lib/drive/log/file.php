<?php
namespace core\lib\drive\log;

use core\lib\conf;

class file
{
 
    public $path;

    public function __construct()
    {
        $conf = conf::get('OPTION','log');
        $this->path = $conf['path'];   
    }

    public function log($message){

        if(!is_dir($this->path)){
            mkdir($this->path,'0777',true);
        }
        $file_name = date('Ymd');
        $msg = date('Ymdhis').'  log:  '.$message. PHP_EOL;

        file_put_contents($this->path.$file_name.'.php',$msg,FILE_APPEND);
    }


}