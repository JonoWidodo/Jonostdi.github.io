<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

@extends('normal')

@section('title')
    List Mahsiswa - STDI
@stop

@section('content')
    
<div class="container-fluid font-white " > 
    
    
    <div class="col-xs-12 col-sm-7">
        <div class="col-xs-2">Nama</div>
        <div class="col-xs-5">{{$result['result'][0]['nm_pd']}}</div>
        <div class="col-xs-5 text-right"><b>IP Semester</b> {{$result['ips']}}</div>
        <div class="col-xs-2">NIM</div> 
        <div class="col-xs-5">{{$result['result'][0]['nipd']}}</div>
        <div class="col-xs-5 text-right">Total SKS {{$result['totalsks']}}</div>
    </div>    
    <div class="col-xs-12 col-sm-7 bgtransparan2 lengkung">        
        
        <table class="font-white table">
        <tr class="bgtransparan2">
            <th>Kode MK</th><th>Mata Kuliah</th><th>SKS</th><th>Nilai</th><th>Huruf</th>
        </tr>
        @foreach ($result['result'] as $key => $nilai)
        <tr>
            <td>{{$nilai['kode_mk']}}</td><td><?php echo($result['mk'][$key]['fk__id_mk']) ?></td><td>{{$nilai['sks_mk']}}</td><td>{{$nilai['nilai_angka']}}</td><td>{{$nilai['nilai_huruf']}}</td>
        </tr>
        @endforeach
        </table>
    </div>
    
    
    <div class="col-xs-12 col-sm-3 col-md-offset-1 bgtransparan2 lengkung ">
        <div class="form-background "></div>
        {!! Form::open(['Url' => 'nilai/cari', 'method'=> 'get']) !!}
            {{ Form::token()}}
            <div class="form-group ">
                <label for="InputNim " class="hpadding5">NIM</label>
                <input name="nim" type="text" class="form-control hpadding5" id="InputNim" placeholder="NIM">
                <button type="submit" class="btn btn-success hpadding5">Submit</button>
            </div>
        {!! Form::close() !!}
    </div>
</div>
   
@stop