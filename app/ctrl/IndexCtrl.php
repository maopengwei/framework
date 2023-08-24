<?php
namespace app\ctrl;

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

}