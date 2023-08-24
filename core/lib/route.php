<?php
namespace core\lib;

use core\lib\conf;

class route
{

    public $ctrl;
    public $action;


    public function __construct()
    {

        $path = $_SERVER['REQUEST_URI'];
        $patharr = explode('/',trim($path,'/'));

        if(isset($path) && $path != '/'){
            if(isset($patharr[0])){
                $this->ctrl = $patharr[0];
                unset($patharr[0]);
            }
    
            if(isset($patharr[1])){
                $this->action = $patharr[1];
                unset($patharr[1]);
            }else{
                $this->action = conf::get('ACTION','route');
            }

            $i = 2;
            $count = count($patharr) + 2;
            while($i < $count){
                if($patharr[$i +1]){
                    $_GET[$patharr[$i]] = $patharr[$i+1];
                }
                $i = $i + 2;
            }

        }else{
            $this->ctrl = conf::get('CTRL','route');
            $this->action = conf::get('ACTION','route');
        }
        $message = 'route access:' . $this->ctrl . ' and ' . $this->action;
        \core\lib\log::log($message);

    }
































    /*
    public function __construct()
    {
        p('route already ok!');

       $path = $_SERVER['REQUEST_URI'];
       if(isset($path) && $path != '/'){
          $patharr = explode('/',trim($path,'/'));
          if(isset($patharr[0])){

            $this->ctrl = $patharr[0];
            unset($patharr[0]);
          }
          if(isset($patharr[1])){
            $this->action=$patharr[1];
            unset($patharr[1]);
        }else{
            $this->action = 'index';
          }
          // url多余部分转化为参数
          $count = count($patharr) + 2;
          $i = 2;
          while($i < $count){
            if(isset($patharr[$i+1])){
                $_GET[$patharr[$i]] = $patharr[$i + 1];
            }
            $i = $i + 2;
          }
          P($_GET);



       }else{
        $this->ctrl = 'index';
        $this->action = 'index';
       }

    }

    */
}