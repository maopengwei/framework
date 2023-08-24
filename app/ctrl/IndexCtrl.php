<?php
namespace app\ctrl;

class IndexCtrl extends \core\core
{

    public function index(){
        //p('it is indexCtrl/index');
        $model = new \core\lib\model(); 
        $sql = "select * from migrations";
        $rel = $model->query($sql);
        p($rel->fetchAll());
        $data = 'hello world';

        $this->assign('data',$data);
        $this->display('index.html');

    }

}