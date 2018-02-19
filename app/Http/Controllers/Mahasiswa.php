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

class Mahasiswa extends Controller
{
    
    function index()
    {    
        $feeder = new Feeder();
        $nama = strtoupper(Input::get('nama'));
        $table = 'mahasiswa_pt';
        $filter = "nipd like '%$nama%'";
        
        $result = $feeder->getProxy()->GetRecord($feeder->getToken(), $table, $filter);
       
        return view('page.mahasiswa',['result' => $result['result']]);
    }
    
    function profile($nim=null)
    {
        $feeder = new Feeder();
        $nama = Input::get('nim');
        $table = 'mahasiswa';
        $filter = "nm_pd ilike '%$nama%'";
        
        $result = $feeder->getProxy()->GetRecord($feeder->getToken(), $table, $filter);
        
        return view('page.profilemahasiswa',['result' => $result['result']]);
    }
    
    function lst()
    {
        echo "Olrait you'e in mhs/list";
        
        $feeder = new Feeder();
        $table = 'mahasiswa_pt';
        $order = '';
        $filter = "nipd ilike 'A1B213001%'";
        $limit = 5;
        $offset = 0;
        
        
        $result = $feeder->getProxy()->GetRecordset($feeder->getToken(), $table, $filter,$order, $limit, $offset);
        
        echo '<pre>';
        var_dump($result);
        echo '</pre>';
        
        return view('page.mhs.lst');
    }
    
    
}
