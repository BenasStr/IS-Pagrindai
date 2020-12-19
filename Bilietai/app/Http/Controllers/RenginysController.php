<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renginys;

class RenginysController extends Controller
{
    public function getAllEvents() {
        $allEvents = Renginys::all();
        $count = Renginys::all()->count();
        return view('events/events', compact(['allEvents', 'count']));
    }

    public function getEvent($id) {
        $event = Renginys::all()->where('id_Renginys', $id)->first();
        return view('events/event', compact('event'));
    }
}
