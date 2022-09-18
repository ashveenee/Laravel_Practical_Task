<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculation;

class UserController extends Controller
{
    //redirect to index page
    public function index()
    {

        $list = Calculation::get(); 
 
        return view('calculation.index',compact('list'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
          
    }
    //redirect to create page
    public function create()
    {
        $list = Calculation::get();
        return view('calculation.create',compact('list'));

    }

    //insert data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'principal' => 'required',
            'rate' => 'required',
            'time' => 'required',
        ], 
        [
          'name.required' => 'Name is required.',
          'principal.required' => 'Principal is required.',
          'rate.required' => 'Rate is required.',
          'time' => 'Time is required',
        ]);

        if(isset($_POST))
        {
            $principal = $_POST['principal'];
            $rate = $_POST['rate'];
            $time = $_POST['time'];

            //Simple Interest formula
            $interest = $principal * $time * $rate/100;
       
        }
            
            $list = new Calculation();
            $list->name = $request->name;
            $list->principal = $request->principal;
            $list->rate = $request->rate;
            $list->time = $request->time;
            $list->interest = isset($interest) ? $interest : "";
            $list->created_at = date('Y-m-d H:m');
            $list->save();

 
        return redirect()->route('calculation.index')->with('success','Calculation has been added successfully.');
    }

    //redirect to view page
    public function show($id)
    {
        $user = Calculation::where('id', $id)->first();
        return view('calculation.show',compact('user'));
    }

    public function deleteRecord()
    {
        $id = $_POST['id'];
        $list = Calculation::where('id', $id)->first();
        $list->delete();

        return response()->json([
            'status' => "success",
            'message' => "Calculation has been deleted successfully"
        ]);
    }

}
