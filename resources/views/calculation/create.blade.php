@extends('layouts.layout')
 
@section('content')
 
<div class="container shadow-none bg-light mt-3  " style="width: 50rem;">
<div class="row card p-5 text-center">
    <div class="row margin-tb">
        <div class="col-sm-11">
            <h2>Add Calculation Detail</h2>
        </div>
        <div class="col-sm-1">
            <a class="btn btn-primary" href="{{ route('calculation.index') }}">Back</a>
        </div>
    </div>
</div>
</div>

 
<form action="{{ route('calculation.store') }}" method="POST" enctype="multipart/form-data" id="check_validation">
    @csrf
 
<div class="container card shadow-lg p-3 mb-5" style="width: 50rem;">
        <div class="row mb-12 p-3">
          <label for="name" class="col-sm-3 col-form-label">Name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ old('name') }}" autocomplete = off>
            <p id="validation_error">@error('name'){{ $message }} @enderror</p>

          </div>
        </div>

        <div class="row mb-12 p-3">
            <label for="principal" class="col-sm-3 col-form-label">Principal</label>
            <div class="col-sm-9">
            <input type="text" class="form-control" name="principal" id="principal" placeholder="Enter Principal" value="{{ old('principal') }}" autocomplete = off>
                <p id="validation_error">@error('principal'){{ $message }} @enderror</p>
            </div>
        </div>

        <div class="row mb-12 p-3">
            <label for="rate" class="col-sm-3 col-form-label">Rate</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="rate" id="rate" placeholder="Enter Rate" value="{{ old('rate') }}" autocomplete = off>
              <p id="validation_error">@error('rate'){{ $message }} @enderror</p>
            </div>
        </div>


        <div class="row mb-12 p-3">
            <label for="time" class="col-sm-3 col-form-label">Time</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="time" id="time" placeholder="Enter Time" value="{{ old('time') }}" autocomplete = off>
              <p id="validation_error">@error('time'){{ $message }} @enderror</p>

            </div>
          </div>
 
 
        <div class="row text-center">
 
          <div class="col-sm-12 p-3">
            <button type="submit" class="btn btn-primary btn-md shadow-lg">Save</button>
            <a class="btn btn-danger btn-md shadow-lg" href="{{ route('calculation.index') }}"> Cancel</a>
          </div>
 
        </div>
 
    </div>
 
</form>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
   <script>
    $(document).ready(function () {
    $('#check_validation').validate({ // initialize the plugin
        rules: {
            name: {
                required: true
            },
            principal: {
                required: true,
            },
            rate: {
                required: true,
                
            },
            time: {
                required: true,
                
            },
          
        }
    });
});
</script>
<style type="text/css">
    .error
    {
        color: red;

    }
</style>
@endsection