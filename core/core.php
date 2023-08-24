<?php
namespace core;

class core
{
    public static $classMap = array();
    public $assign = [];

    static public function run()
    {
        \core\lib\log::init();
        
        $route = new \core\lib\route;
        $ctrl = $route->ctrl;
        $action = $route->action;
       

        $path = '\\app\\ctrl\\' . $ctrl.'Ctrl';
        $info = new $path;
        $info->$action();

    }

    static public function load($class)
    {

        if(isset($classMap[$class])){
           
            return true;

        } else {
            $class = str_replace('\\', '/', $class);
            $file = ROOT."/".$class.'.php';

            try{
                include $file;
                self::$classMap[$class] = $class;
            }catch(\Exception $e){
                echo $e->getMessage();
            }
        }
        
    }

    public function assign($name,$value){

        $this->assign[$name] = $value;
    }

    public function display($file){
        $file =   APP.'/view/'.$file;

       
        try{
            extract($this->assign);
            include $file;
            
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    } 

}