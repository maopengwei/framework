<?php
namespace core\lib;

class conf
{
    static public $conf = array();

    static public function get($name,$file)
    {
        $path = CORE.'/config/' . $file . '.php';

        if(isset(self::$conf[$file])){
            return self::$conf[$file][$name];
        }else{
            if(is_file($path)){
                $conf = include $path;
                if(isset($conf[$name])){
                    self::$conf[$file] = $conf;
                    return $conf[$name]; 
                }else{
                    throw new \Exception('no this conf item: '.$name);
                }
            }else{
                throw new \Exception("can't find conf file:  ".$file);
            }
        }
    }


    static public function getAll($file)
    {
        $path = CORE.'/config/' . $file . '.php';

        if(isset(self::$conf[$file])){
            return self::$conf[$file];
        }else{
            if(is_file($path)){
                $conf = include $path;
                self::$conf[$file] = $conf;
                return $conf;
                
            }else{
                throw new \Exception("can't find conf file:  ".$file);
            }
        }
    }
}