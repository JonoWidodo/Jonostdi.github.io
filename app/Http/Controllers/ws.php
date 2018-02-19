<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;
include(app_path().'/nusoap/nusoap.php');
include(app_path().'/nusoap/class.wsdlcache.php');

use Illuminate\Http\Request;
use App\Http\Requests;
use nusoap_client;



class Ws extends Controller
{
    
    //
    function index()
    {
        $url='http://localhost:8082/ws/sandbox.php?wsdl';
        $client = new nusoap_client($url,TRUE);
        $proxy = $client->getProxy();
        //cek auth
        $username = '043079';
        $password = 'dkyaad25gn';
        
        //Ambil Token
        $result = $proxy->GetToken($username, $password);
        $token = $result;
        
        return $token;
    }
}