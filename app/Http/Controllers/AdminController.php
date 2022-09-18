<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calculation ;

class AdminController extends Controller
{
    //redirect to index page
    public function index()
    {

        $user_list = Calculation::get(); 
 
        return view('admin.index',compact('user_list'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
          
    }
}
