<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vartotojas;
use App\Models\Renginys;

class AdminController extends Controller
{
    public function index(){
        return view('AdminViews/index');
    }

    public function getEvents(){
        $events = Renginys::all();
        return view('AdminViews/eventsAdmin', compact('events'));
    }
}
