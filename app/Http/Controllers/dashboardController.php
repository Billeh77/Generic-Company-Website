<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class dashboardController extends Controller
{
    
    public function getUser(Request $request) {

        return view('home', ['user' => $request->user()]);

    }

}
