<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScrapData;

class ScrapController extends Controller
{
    // Listings and index page
    public function listings() {
        $allData  = ScrapData::all();

        return view('index', compact('allData'));
    }
}
