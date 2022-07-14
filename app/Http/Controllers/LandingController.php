<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        return view('landing.pages.index');
    }

    public function habitaciones(){
        return view('landing.pages.habitaciones');
    }

    public function contactanos(){
        return view('landing.pages.contactanos');
    }

    public function nosotros(){
        return view('landing.pages.nosotros');
    }

    public function reserve(){
        return view('landing.pages.reserve');
    }

    public function servicios(){
        return view('landing.pages.servicios');
    }


    
}

