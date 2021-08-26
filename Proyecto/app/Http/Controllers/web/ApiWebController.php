<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiWebController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rol.regular');
        $this->middleware('verified');
    }

    public function index(){
        return view('web.index');
    }
    public function detail(){
        return view('web.index');
    }
    public function post_category(){
        return view('web.index');
    }
    public function contact(){
        return view('web.index');
    }
    public function categories(){
        return view('web.index');
    }
    public function download(){
        return view('web.index');
    }
}
