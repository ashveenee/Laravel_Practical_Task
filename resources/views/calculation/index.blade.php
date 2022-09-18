@extends('layouts.layout')

@section('content')

    <div class="container shadow bg-light mt-3 p-3 " >
        <div class="row">
            <div class="row margin-tb">
                <div class="col-sm-9">
                    <h3>User List</h3>
                </div>
                <div class="col-sm-3">
                    <a class="btn btn-primary" href="{{ route('calculation.create') }}" style="margin-left: 258px;"> Add</a>
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
            <th class="text-right">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->principal }}</td>
            <td>{{ $user->rate }}</td>
            <td>{{ $user->time }}</td>
            <td>{{ $user->interest }}</td>
            <td class="td-actions text-right">
                <a class="btn btn-success btn-sm" href="{{ route('calculation.show',$user->id) }}"><i class="fa-solid fa-eye" title="View"></i></a>
                <button type="submit" class="btn btn-danger btn-sm" class="deleteRecord" id= "deleteRecord" value="{{ $user->id }}" onclick="deleteRecord();"><i class="fa-solid fa-trash-can" title="Delete"></i></button>                                
            </td>
        </tr>
        @endforeach
        </tbody>       
    </table>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {

    var table = $("#display_datatable").DataTable({

         order: [],
        columnDefs: [ {
            'targets': [6], 
            'orderable': false, 
        }],
      
        "iDisplayLength": 10,

     
       "responsive": true, "lengthChange": true, "autoWidth": false, "orderCellsTop": true,
    
      
     });

  }); 

//delete using ajax
function deleteRecord() {

   var id = $("#deleteRecord").val();

   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
   });
   $.ajax({
      url: "{{route('calculation.deleteRecord')}}",
      method: 'post',
      data: {
         'id': id,
          "_token": "{{ csrf_token() }}",
      },
      success: function(result) { 

         setInterval( function () {
            window.location.reload();
            }, 1000 );
      }
   });
}
</script>