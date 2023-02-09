<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    //
    public function index(){
        return view('portfolio.index');
    }
    public function services(){
        return view('portfolio.services');
    }
    public function doctors(){
        return view('portfolio.doctors');
    }
    public function contact_us(){
        return view('portfolio.contact');
    }
    public function about_us(){
        return view('portfolio.about');
    }
}
