<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MongoDB\Driver\Command;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;

class Mongodb
{
    public static $link=false;
    public static function getMongoDB()
    {
        try {
            if(!self::$link){
                $uri = "mongodb://" . env("Monusername") . ":" . env("Monpassword") . "@" .env("Monhost") . "/" . env("MonauthDB");
                $manager = new Manager($uri);
                $command = new Command([]);
                dd($manager->executeCommand("mxmanage",$command));die;
                self::$link =$manager;
            }
            return self::$link;
        } catch (Exception $e) {
            print $e->getMessage();exit();
        }
    }

    //数据库查询
    public static function  MQuery($collTabname,$filer,$option=[])
    {
        $query = new Query($filer,$option);
        $mongo = self::getMongoDB();
        $data = $mongo -> executeQuery("mxmanage",$query);
//        dd($data);die;
        foreach ($data as $item){
            dd($item);
        }
        die;
        return $data->toArray();
    }
}
