<?php

namespace App\Http\Controllers\Cnmail;

use App\Models\Mongodb;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use MongoDB\Driver\Command;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;

class IndexController extends Controller
{
    private $sendnum = 0;
    private $tableName = "";

    /**
     *获取表
     */
    public function index()
    {
        //验证时间有没有改变
        if (file_exists("num.txt")) {
            $modify_time = filemtime("num.txt");
            $change_time = time() - $modify_time;
            if ($change_time < 100) {
                exit;
            }
        }
//        ignore_user_abort(0);
        set_time_limit(0);
        //获取文件的路径
        $path = 'num.txt';
        //判断有没有这个文件
        if (file_exists($path)) {
            $contents = file_get_contents($path);
            //判断文件夹中有没有内容
            if (!empty($contents)) {
                $table = explode(':', $contents);
                $this->sendnum = $table[1];
                $this->tableName = $table[0];
                $this->run();
            } else {
                //没有内容静态走模块中的方法
                $table = Mongodb::getTableName();
                $content = $table . ":" . $this->sendnum;
                file_put_contents($path, $content);
                $this->tableName = $table;
                $this->run();
            }
        } else {
            //没有文件创建自动添加内容
            $table = Mongodb::getTableName();
            $content = $table . ":" . $this->sendnum;
            file_put_contents($path, $content);
            $this->tableName = $table;
            $this->run();
        }
    }

    /**
     * 传递数据给遍历函数并返回单条数据进行处理
     * @param $tableName
     * @param $sendNumber
     */
    public function run()
    {
        $options = [
            "skip" => $this->sendnum,
            "limit" => 500
        ];
        $manager=Mongodb::getMongoDB();
        $command=new Command([
            "count"=>$this->tableName
        ]);
        $count =$manager->executeCommand('mxmanage',$command);
        $num = $count->toArray()[0]->n;
        while (1) {
            file_put_contents("bug.txt",time());
            if($this->sendnum>=$num){
                $this->tableName = Mongodb::getTableName($this->tableName);
                $this->sendnum = 0;
             }
            if (!is_dir($this->tableName)) {
                mkdir($this->tableName);
            }
            $uri = "mongodb://" . env("Monusername") . ":" . env("Monpassword") . "@" .env("Monhost") . "/" . env("MonauthDB");
            $manager = new Manager($uri);
            $query=new Query([],$options);
            $obData=$manager->executeQuery("mxmanage.".$this->tableName,$query);
            foreach ($this->mapData($obData) as $key=>$item) {
                $obj = $item();
                $array = json_decode(json_encode($obj), true);
                $this->makeFile($array);
            }
        }

    }

    /**
     * @param $tableName
     * @param $sendNumber
     * @param $obj
     */
    public function makeFile($obj)
    {
        $content = view('index', compact('obj'))->__toString();
        $path = $this->tableName . "/" . $this->tableName . $obj["id"] . ".html";
        $isWrited = file_put_contents($path, $content);
        if ($isWrited) {
            $this->sendnum++;
            file_put_contents('1.txt',$this->sendnum."\r\n");
            file_put_contents('num.txt',$this->tableName.":".$this->sendnum);
        }

    }

    /**
     * 遍历返回数据
     * @param $data
     * @return \Generator
     */
    public function mapData($data)
    {
        foreach ($data as $item) {
            yield function () use ($item) {
                return $item;
            };
        }
    }
}
