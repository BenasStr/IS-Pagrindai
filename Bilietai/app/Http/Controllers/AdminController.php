<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vartotojas;
use App\Models\Renginys;
use App\Models\Pardavejas;

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
        $pirkejai = Vartotojas::with('pirkejas')->where('Tipas', 1)->get();
        $pardavejai = Vartotojas::with('pardavejas')->where('Tipas', 2)->get();
        return view('AdminViews/usersAdmin', compact('pirkejai', 'pardavejai'));
    }

    public function promoteEvent(Request $request){
        //echo $request->input('renginiuKelimas');

        $event = Renginys::all()
            ->where('id_Renginys', $request->input('renginiuKelimas'))
            ->first();

        $event -> Prioritetas = 11;
        $event -> save();
        return redirect('admin/getEvents');
    }
}
