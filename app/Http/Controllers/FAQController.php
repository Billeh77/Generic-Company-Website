<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    //
    public function getFAQ() {
        $allFAQ = FAQ::all();

        return view('faq', ['faq' => $allFAQ]);
    }
}
