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

    public function getUsers(){
        $pirkejai = Vartotojas::all()
            ->where('Tipas', 1);
        $pardavejai = Vartotojas::all()
            ->where('Tipas', 2);
        return view('AdminViews/usersAdmin', compact('pirkejai', 'pardavejai'));
    }
}
