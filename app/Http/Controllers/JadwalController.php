<?php

namespace App\Http\Controllers;

include (app_path().'\addon\PDFMerger\PDFMerger.php');

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function __construct()
    {
    }

    
    public function index()
    {
        return view('page.jadwal');
    }
}
