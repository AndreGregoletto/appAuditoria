<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function index()
    {
        return view('system.index');
    }

    public function getRag()
    {
        return view('system.navbar.rag');
    }

    public function sendBalancete()
    {
        return view('system.navbar.sendBalancete');
    }
}
