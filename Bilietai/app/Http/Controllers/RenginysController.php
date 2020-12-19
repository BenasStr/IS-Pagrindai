<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renginys;
use App\Models\Atsiliepimas;
use App\Models\Vartotojas;

class RenginysController extends Controller
{
    public function getAllEvents() {
        $events = Renginys::all();
        $count = Renginys::all()->count();
        return view('events/events', compact(['events', 'count']));
    }

    public function getEvent($id) {
        $event = Renginys::all()->where('id_Renginys', $id)->first();
        return view('events/event', compact('event'));
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

    public function getEventFeedback(Request $request) {
        
    }
}
