<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class PortfolioController extends Controller
{
    //
    public function contact_us_index(){
        $contact_us_list = ContactUs::all();
        return view('admin.portfolio.contact_us', compact('contact_us_list'));
    }
}
