<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vartotojas;
use App\Models\Renginys;
use App\Models\Pardavejas;

class AdminController extends Controller
{
    public function indexAdmin(){
        return view('AdminViews/index');
    }

    public function getEventsAdmin(){
        $events = Renginys::all();
        return view('AdminViews/eventsAdmin', compact('events'));
    }

    public function getUsersAdmin(){
        $pirkejai = Vartotojas::with('pirkejas')->where('Tipas', 1)->get();
        $pardavejai = Vartotojas::with('pardavejas')->where('Tipas', 2)->get();
        return view('AdminViews/usersAdmin', compact('pirkejai', 'pardavejai'));
    }

    public function promoteEventAdmin(Request $request){
        //echo $request->input('renginiuKelimas');

        $event = Renginys::all()
            ->where('id_Renginys', $request->input('renginiuKelimas'))
            ->first();

        $event -> Prioritetas = 11;
        $event -> save();
        return redirect('admin/getEvents');
    }
}
