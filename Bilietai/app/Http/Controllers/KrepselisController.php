<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Krepselis;
use App\Models\Bilietas;
use App\Models\Renginys;

class KrepselisController extends Controller
{
    public function getTickets($id_cart) {
        $cart = Krepselis::all()->where('id_Krepselis', $id_cart)->first();
        $tickets = Bilietas::all()->where('fk_Krepselisid_Krepselis', $id_cart);
        $events_ids = Bilietas::where('fk_Krepselisid_Krepselis', $id_cart)->get('fk_Renginysid_Renginys')->unique('fk_Renginysid_Renginys');
        $events = array();
        foreach ($events_ids as $id) {
            $event = Renginys::all()->where('id_Renginys', $id->fk_Renginysid_Renginys)->first();
            array_push($events, $event);
        }

        return view('Cart/cart', compact(['cart', 'tickets', 'events']));
    }
}
