<?php

namespace App\Http\Controllers\Cnmail;

use App\Models\Mongodb;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use MongoDB\Driver\Query;


class IndexController extends Controller
{

    public function index()
    {   //获取文件的路径
        $path = base_path('views/num.txt');
        //判断有没有这个文件
        if (file_exists($path)) {
            $contents = file_get_contents($path);
           //判断文件夹中有没有内容
            if (!empty($contents)) {
                $table = explode(':', $contents);
                $this->run($table[0], $table[1]);
            } else {
                //没有内容静态走模块中的方法
                $table = Mongodb::getTableName();
                $content = $table . ":" . "0";
                file_put_contents($path,$content);
                $this->run($table, 0);
            }
        }else{
            //没有文件创建自动添加内容
            $table = Mongodb::getTableName();
            $content = $table . ":" . "0";
            file_put_contents($path,$content);
            $this->run($table, 0);
        }
    }

    public function run($tableName, $sendNumber)
    {

    }
}
