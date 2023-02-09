<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $roles = DB::table('roles')->get();
        return view('admin.roles-permissions.roles-index', compact('roles'));
    }
}
