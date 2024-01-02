<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    public function clients() {

        $allClients = Client::all();

        return view('clients', ['clients' => $allClients]);

    }

    public function search(Request $request) {

        $in = $request->input('clientsSearch');

        $allClients = Client::where('businessName', 'like','%' . $in . '%')->orWhere('description', 'like','%' . $in . '%')->get();

        return view('clients', ['clients' => $allClients]);

    }
}
