<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renginys;
use App\Models\Atsiliepimas;
use App\Models\Vartotojas;
use App\Models\Bilietas;

class RenginysController extends Controller
{
    public function getAllEvents() {
        $events = Renginys::orderBy('Prioritetas', 'desc')->where('Prioritetas', '!=', '0')->get();
        $count = $events->count();
        return view('events/events', compact(['events', 'count']));
    }

    public function getEvent($id) {
        $event = Renginys::all()->where('id_Renginys', $id)->first();
        $ticket_count = Bilietas::where('fk_Renginysid_Renginys', $id)->where('fk_Krepselisid_Krepselis', null)->get()->count();
        return view('events/event', compact(['event', 'ticket_count']));
    }

    public function getFilteredEvents(Request $request) {
        $key = "/".$request->input('search')."/i";
        $allEvents = Renginys::all();
        $events = array();
        foreach ($allEvents as $event) {
            $name = $event->Pavadinimas;
            if(preg_match($key, $name)){
                array_push($events, $event);
            }
        }
        $count = count($events);
        return view('events/events', compact(['events', 'count']));
    }
}
