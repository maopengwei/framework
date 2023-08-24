<?php

/**
 * 入口文件
 * 1. 定义常量
 * 2.加载函数库
 * 3.启动框架
 * */

 define('ROOT', realpath('./'));

 define('CORE',ROOT.'/core');
 define('APP',ROOT.'/app');

 define('DEBUG',true);

 if(DEBUG){
    ini_set('display_error','On');
 }else{
    ini_set('display_error','off');
 }

 date_default_timezone_set('Asia/ShangHai');

 include CORE . '/common/function.php';
 include CORE . '/core.php';

 spl_autoload_register('\core\core::load');
  
 \core\core::run();

