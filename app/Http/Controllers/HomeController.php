<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            return view('admin');
        } elseif ($usertype == '2') {
            return view('buyer');
        } elseif ($usertype == '0') {
            return view('farmer');
        } else {
            return view('dashboard');
        }
    }

   
}
