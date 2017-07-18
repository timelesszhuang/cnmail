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
    {

    }

    public function run($tableName,$sendNumber)
    {
        $options=[
            "skip"=>$sendNumber,
            "limit"=>50
        ];
        $obData=Mongodb::MQuery("mxmanage.".$tableName,[],$options);
        foreach($this->mapData($obData) as $item){


        }
    }

    public function makeFile($tableName)
    {

    }

    /**
     * 遍历返回数据
     * @param $data
     * @return \Generator
     */
    public function mapData($data)
    {
        foreach($data as $item){
            yield function () use($item){
                 return $item;
            };
        }
    }
}
