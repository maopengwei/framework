<?php
namespace app\ctrl;

use core\lib\medooModel;

class IndexCtrl extends \core\core
{

    public function index(){
        /*
        $model = new \core\lib\model(); 
        $sql = "select * from migrations";
        $rel = $model->query($sql);
        */
        $data = 'hello world';
        $this->assign('data',$data);
        $this->display('index.html');
        
    }

    public function medoo(){
        
        $model = new medooModel();
        P($model);   
        $data = $model->select("migrations", [
            "id",
            "migration",
            "batch"
        ]);
        dump($data);
    }

}