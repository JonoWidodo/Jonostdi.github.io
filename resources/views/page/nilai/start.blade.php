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
    
<div class="container-fluid font-white" > 
    <div class="col-xs-12 col-sm-7">
        {{$error}}
    </div>
    
    <div class="col-xs-12 col-sm-3 col-md-offset-1 bgtransparan2 lengkung">
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