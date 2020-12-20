<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Renginys;
use Illuminate\Http\Request;
use App\Models\Atsiliepimas;
use App\Models\Pirkejas;
use App\Models\Vartotojas;

class AtsiliepimasController extends Controller
{
    public function getEventFeedback($id) {
        $rewiews = Atsiliepimas::where("fk_Renginysid_Renginys", $id)->get();
        $rewiew_id = array();
        foreach ($rewiews as $rewiew) {
            array_push($rewiew_id, $rewiew->fk_Pirkejasid_Pirkejas);
        }

        $users = Pirkejas::with('vartotojas')->where("id_Pirkejas", $rewiew_id)->get('fk_Vartotojasid_Vartotojas');
        $count = count($users);

        return view('events/feedback', compact(['rewiews', 'users', 'count']));
    }
}
