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

class Nilai extends Controller
{
    
    public function index(Request $request, $nim=null)
    {            
        $nim = $request->input('nim');
        if ($nim==null)
        {
            $error = "Silahkan masukan NIM anda";
            return view('page.nilai.start',['error' => $error]);
        }
        
        //lihat berapa record, 1 = lanjut ; 0 = Nim tidak ditemukan; <1 = Nim kurang spesifik
        $feeder =  new Feeder();
        $table = 'mahasiswa_pt';
        $filter = "nipd ilike '".$nim."%'";
        $result = $feeder->getProxy()->GetCountRecordset($feeder->getToken(), $table, $filter);
        if ($result['result'] =='0')
        {
            $error = "NIM tidak ditemukan";
            return view('page.nilai.start',['error' => $error]);
        }
        elseif($result['result'] != '1')
        {
            $error = "NIM yang dimasukan kurang spesifik";
            return view('page.nilai.start',['error' => $error]);
        }
        
        //lihat apakah mahasiswa yang telah terpilih merupakan mahasiswa aktif pada semester kemarin?
        $feeder =  new Feeder();
        $table = 'nilai';
        $filter = "nipd ilike '".$nim."%' AND id_smt = '".env('MY_SEMESTER_AKTIF')."'";
        $result = $feeder->getProxy()->GetCountRecordset($feeder->getToken(), $table, $filter);
        if ($result['result'] =='0')
        {
            $error = "Nilai Mahasiswa Tidak Ditemukan pada Semester Kemarin";
            return view('page.nilai.start',['error' => $error]);
        }
                
        
        //ambil nilai
        $feeder = new Feeder();
        $table = 'nilai';
        $order = 'kode_mk asc';
        $filter = "nipd ilike '".$nim."%' AND id_smt = '".env('MY_SEMESTER_AKTIF')."'";
        $limit = 12;
        $offset = 0;
        
        $result = $feeder->getProxy()->GetRecordset($feeder->getToken(), $table, $filter,$order, $limit, $offset);
        
        //ambil mk
        foreach ($result['result'] as $key => $val)
        {
            $daftar_mk[$key] = $val['id_kls'];
        }
        $daftar_mk = implode("', '",$daftar_mk);
        
        $feeder = new Feeder();
        $table = 'kelas_kuliah';
        $order = 'kode_mk asc';
        $filter = "id_kls in ('".$daftar_mk."') ";
        $limit = '12';
        $offset = 0;
        
        $mk = $feeder->getProxy()->GetRecordset($feeder->getToken(), $table, $filter,$order, $limit, $offset);
        $result['mk'] = $mk['result'];
        
        // Menghitung IPS Sementara Aja
        $totalpoin = 0;
        $totalsks = 0;
        foreach ($result['result'] as $key => $val)
        {
            $totalpoin = $totalpoin + ($val['nilai_indeks']*$val['sks_mk']);
            $totalsks = $totalsks + $val['sks_mk'];
        }
        $result['totalsks'] = $totalsks;
        $result['ips'] = number_format((float)$totalpoin/$totalsks, 2, ',', '');
    
        
        //Rendering View
        return view('page.nilai.utama',['result' => $result]);
    }
    
    public function cari()
    {
        //$url = url('/nilai'.$request->input('nim'));
        //echo($url);
    }
    
}
