<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){

       if(Auth::user()->usertype =='user'){

        return view('dashboard');

       }else{

        return view('admin.home');

       }
    }
}
