<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atsiliepimas;
use App\Models\Pardavejas;
use App\Models\Vartotojas;

class AtsiliepimasController extends Controller
{
    public function getEventFeedback($id) {
        /*KLAIDAAAA*/
        $rewiews = Atsiliepimas::all()->where("fk_Renginysid_Renginys", $id);
        $user_id = Pardavejas::all()->where("id_Pirkejas", $rewiews->fk_Pardavejasid_Pardavejas)->get('fk_Vartotojasid_Vartotojas');
        $users = Vartotojas::all()->where("id_Vartotojas", $user_id);
        $count = count($users);

        return view('events/feedback', compact(['rewiews', 'users', 'count']));
    }
}
