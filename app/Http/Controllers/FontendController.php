<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FontendController extends Controller
{
    public function mainIndex(){

        return view('backend.master');
    }
}
