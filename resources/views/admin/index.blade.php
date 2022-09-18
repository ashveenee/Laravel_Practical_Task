@extends('layouts.layout')

@section('content')

    <div class="container shadow bg-light mt-3 p-3 " >
        <div class="row">
            <div class="row margin-tb">
                <div class="col-sm-9">
                    <h3>User List</h3>
                </div>
            </div>
        </div>
        </div><br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success card shadow">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-hover" id="display_datatable">
        <thead class="border-top">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Principle</th>
            <th>Rate</th>
            <th>Time</th>
            <th>Interest</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($user_list as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->principal }}</td>
            <td>{{ $user->rate }}</td>
            <td>{{ $user->time }}</td>
            <td>{{ $user->interest }}</td>
        </tr>
        @endforeach
        </tbody>       
    </table>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {

    var table = $("#display_datatable").DataTable({
      
        "iDisplayLength": 10,

     
       "responsive": true, "lengthChange": true, "autoWidth": false, "orderCellsTop": true,
    
      
     });

       
  }); 

</script>