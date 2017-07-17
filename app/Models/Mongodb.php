<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;

class Mongodb
{
    public static $link=false;
    public function getMongoDB()
    {
        try {
            if(!self::$link){
                $mongo = config("mongodb");
                $uri = "mongodb://" . $mongo["username"] . ":" . $mongo["password"] . "@" . $mongo["host"] . "/" . $mongo["authDB"];
                $manager = new Manager($uri);
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
        $data = $mongo -> executeQuery($collTabname,$query);
        return $data->toArray();
    }
}
