<?php

namespace App\Http\Controllers;

//nusoap
include (app_path().'\nusoap\nusoap.php');
include (app_path().'\nusoap\class.wsdlcache.php');
include (app_path().'\nusoap\feeder.php');


use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
//use App\Mahasiswa;
use nusoap_client;
use Feeder;

class Hlp extends Controller
{
    
    function index($sect)
    {    
        $feeder = new Feeder();
        $table = $sect;
        $result = $feeder->getProxy()->GetDictionary($feeder->getToken(), $table);
        echo '<pre>';
        var_dump($result);
        echo '</pre>';
    }
    
    function shw($sect)
    {
        $feeder = new Feeder();
        $table = $sect;
        $result = $feeder->getProxy()->Getrecord($feeder->getToken(), $table, '');
        echo '<pre>';
        var_dump($result);
        echo '</pre>';
    }
    

    
    
}
