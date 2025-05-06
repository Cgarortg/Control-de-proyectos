<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('sinuser')->only('inicio');
        $this->middleware('normal')->only('inicioUser');
        $this->middleware('admin')->only('inicioAdmin');
        $this->middleware('root')->only('inicioRoot');
    }

    
    public function inicio()
    {
        return view('index');
    }

    public function inicioUser(){
        return view('usuario.index');
    }
    public function inicioAdmin(){
        return view('admin.index');
    }
    public function inicioRoot(){
        return view('root.index');
    }
}
