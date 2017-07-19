<?php

namespace App\Models;

use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;

class Mongodb
{
    /**
     * 资源实例
     * @var bool
     */
    public static $link=false;

    /**
     * 获取查询资源
     * @return bool|Manager
     */
    public static function getMongoDB()
    {
        try {
                $uri = "mongodb://" . env("Monusername") . ":" . env("Monpassword") . "@" .env("Monhost") . "/" . env("MonauthDB");
                $manager = new Manager($uri);
                self::$link =$manager;
                return self::$link;
        } catch (Exception $e) {
            print $e->getMessage();exit();
        }
    }

    /**
     * 数据库查询
     * @param $collTabname
     * @param $filer
     * @param array $option
     * @return \MongoDB\Driver\Cursor
     */
    public static function  MQuery($collTabname,$filer,$option=[])
    {
        $query = new Query($filer,$option);
        $mongo = self::getMongoDB();
        $data = $mongo -> executeQuery("mxmanage.anhui",$query)->toArray();
        return $data;
    }

    /**
     * @param string $name
     * @return mixed
     * 所有表名
     */
    public static function getTableName($name=''){
        $table=[
            "anhui",
            "aomen",
            "beijing",
            "chongqing",
            "cn1",
            "cn2",
            "cn3",
            "cn4",
            "cn5",
            "fujian",
            "gansu",
            "guangdong",
            "guangxi",
            "guizhou",
            "hainan",
            "hongkang",
            "hubei",
            "hunan",
            "jiangsu",
            "jiangxi",
            "jilin",
            "liaoning",
            "mxmanage_stopnum",
            "neimenggu",
            "ningxia",
            "other",
            "qinghai",
            "shandong",
            "shanghai",
            "shanxi",
            "shanxi2",
            "sichuan",
            "taiwan",
            "tianjin",
            "xinjiang",
            "xizang",
            "yunnan",
            "zhejiang"
        ];
        if(!empty($name)){
            // 是否到最后
            if(end($table)==$name){
                die("循环完毕");
                //是否在数组中
            }else if(in_array($name,$table)){
                $index=array_search($name,$table);
                return $table[$index+1];
            }
        }else{
            return $table[0];
        }
    }
}
