<?php
namespace app\ctrl;

use core\lib\medooModel;

class MessageCtrl extends \core\core
{

    public function index(){
        
        
        /*
        $model = new \core\lib\model(); 
        $sql = "select * from migrations";
        $rel = $model->query($sql);
        */
        $data = 'hello message index';
        $this->twigAssign('data',$data);
        $this->twigDisplay('message/index.html');
        
    }

    public function add(){

        $data = 'hello message add';
        $this->assign('data',$data);
        $this->display('message/add.html');

    }

    public function save(){

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

    public function twig(){
        $data = 'hello twig';
        $this->twigAssign('data',$data);
        $this->twigDisplay('twig.html');
    }

    public function extend(){
        $data = 'hello extend';
        $this->twigAssign('data',$data);
        $this->twigDisplay('extend.html');
    }
}