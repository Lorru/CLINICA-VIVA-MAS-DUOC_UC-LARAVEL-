<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function __construct()
    {
        $this->middleware('autenticar');
    }

    public function index()
    {
        return view('inicio');
    }
}
