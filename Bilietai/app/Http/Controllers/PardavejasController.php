<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PardavejasController extends Controller
{
    public function settings()
    {
        return view('Settings/sellerSettings');
    }
}
