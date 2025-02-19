<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    //
    public function index(){
        if(!Gate::allows('admin')){
            abort(403);
        }
        return view('admins.dashboard');
    }
}
