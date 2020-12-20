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
        $buyers_ids = array();
        foreach($rewiews as $rewiew) {
            array_push($buyers_ids, $rewiew->fk_Pirkejasid_Pirkejas);
        }

        $users = Pirkejas::with('vartotojas')->whereIn('id_Pirkejas', $buyers_ids)->get();
        $count = count($rewiews);

        return view('events/feedback', compact(['rewiews', 'users', 'count']));
    }
}
