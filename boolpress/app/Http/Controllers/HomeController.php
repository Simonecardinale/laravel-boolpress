<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.welcome');
    }

    public function contatti()
    {
        return view('guest.contatti');
    }

    public function contattiSent(Request $request)
    {
        $data = $request->all();
        
    }
}
