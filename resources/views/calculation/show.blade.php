@extends('layouts.layout')
 
@section('content')
 
<div class="container shadow-none bg-light mt-3  " style="width: 50rem;">
<div class="row card p-5 text-center">
    <div class="row margin-tb">
        <div class="col-sm-11">
            <h2>Show Calculation Detail</h2>
        </div>
        <div class="col-sm-1">
            <a class="btn btn-primary" href="{{ route('calculation.index') }}">Back</a>
        </div>
    </div>
</div>
</div>
 
<div class="container card shadow-lg p-3 mb-5" style="width: 50rem;">
    <div class="row mb-12 p-3">
        Name : {{ $user->name }}
    </div>
    <div class="row mb-12 p-3">
        Principal : {{ $user->principal }}
    </div>
    <div class="row mb-12 p-3">
        Rate : {{ $user->rate }}
    </div>
    <div class="row mb-12 p-3">
        Time : {{ $user->time }}
    </div>
    <div class="row mb-12 p-3">
        Interest : {{ $user->interest }}
    </div>
  
                
</div>

 
@endsection