<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renginys;

class RenginysController extends Controller
{
    public function getAllEvents() {
        $allEvents = Renginys::all();
        return view('events', compact('allEvents'));
    }
}
