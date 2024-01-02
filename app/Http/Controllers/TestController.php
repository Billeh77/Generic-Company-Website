<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    

    public function test(){
        User::create([
            'name' => 'ibraheem',
            'email' => 'test@test.com',
            'password' => bcrypt('123456'),

        ]);
        $name = 'My name';
        return view('test')->with(['name' => $name]);
    }

    public function getUsers(){
        $users = User::all();
        
    }
}
