@extends('layouts.app')

@section('content')
<script>
        function myName(){
            var lev = document.getElementById("userLevel").value;
            if (lev == "mahasiswa"){
                document.getElementById("nama").style.display = "none";
            }
            if (lev == "dosen" || lev == 'admin'){
                document.getElementById("nama").style.display = "block";
            }
        }
</script>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Level</label>
                            <div class="col-md-6">
                                <select class="form-control" name="level" onchange="myName()" id="userLevel">
                                    <option value="dosen">Dosen</option>
                                    <option value="mahasiswa">Mahasiswa</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }} " id="nama">
                            <label for="nim" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="nim" type="text" class="form-control" name="nama" value="{{ old('nim') }}" required>

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('nim') ? ' has-error' : '' }}">
                            <label for="nim" class="col-md-4 control-label">Nomer Induk</label>

                            <div class="col-md-6">
                                <input id="nim" type="text" class="form-control" name="nim" value="{{ old('nim') }}" required>
                                @if ($errors->has('nim'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nim') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
