<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Krepselis;
use App\Models\Bilietas;
use App\Models\Renginys;

class KrepselisController extends Controller
{
    public function getTickets($id_user) {
        $cart = Krepselis::where('fk_Pirkejasid_Pirkejas', $id_user)->first();
        if($cart == null) {
            return redirect('/')->with('danger', 'Krepšelis yra tuščias!');
        }
        $tickets = Bilietas::where('fk_Krepselisid_Krepselis', $cart->id_Krepselis)->get();
        $events_ids = Bilietas::where('fk_Krepselisid_Krepselis', $cart->id_Krepselis)->get('fk_Renginysid_Renginys')->unique('fk_Renginysid_Renginys');
        $events = array();
        foreach ($events_ids as $id) {
            $event = Renginys::where('id_Renginys', $id->fk_Renginysid_Renginys)->first();
            array_push($events, $event);
        }
        return view('Cart/cart', compact(['cart', 'tickets', 'events']));
    }

    public function addToCart($id) {
        $user_id = session()->get('id');
        $ticket = Bilietas::where('fk_Renginysid_Renginys', $id)->where('fk_Krepselisid_Krepselis', null)->first();
        $cart = Krepselis::where('fk_Pirkejasid_Pirkejas', $user_id)->first();

        if ($cart == null) {
            $cart = new Krepselis();
            $cart->SukurimoData = date("Y-m-d");
            $cart->KrepselioKodas = rand('100000', '999999');
            $cart->fk_Pirkejasid_Pirkejas = $user_id;
            $cart->save();
        }

        $ticket->fk_Krepselisid_Krepselis = $cart->id_Krepselis;
        $ticket->save();
        return redirect('/');
    }

    public function deleteCart($id) {
        $cart_id = Krepselis::where('fk_Pirkejasid_Pirkejas', $id)->get('id_Krepselis')->first();
        $tickets = Bilietas::where('fk_Krepselisid_Krepselis', $cart_id->id_Krepselis)->get();

        foreach ($tickets as $ticket) {
            $ticket->fk_Krepselisid_Krepselis = null;
            $ticket->save();
        }

        Krepselis::where('fk_Pirkejasid_Pirkejas', $id)->delete();
        return redirect('/')->with('success', 'Sėkmingai panaikintas krepšelis!');
    }


}
