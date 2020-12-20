<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pirkejas;
use App\Models\Vartotojas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PardavejasController extends Controller
{
    public function settings()
    {
        $vartotojoID = session()->get('id');
        $tipas = session()->get('tipas');

        $data = Vartotojas::all()
            ->where("id_Vartotojas",$vartotojoID)
            ->first();
        return view('Settings/sellerSettings',compact(array('data')));
    }

    public function keistiDuomenis(Request $request)
    {
        $vartotojoID = session()->get('id');
        $tipas = session()->get('tipas');


        $Vardas = $request->input("vardas");
        $Pavarde = $request->input("pavarde");
        $ElPastas = $request->input("pastoddresas");
        $Slaptazodis = $request->input("slaptazodis");

        $visiVartotojai = Vartotojas::all();
        $prisijungusioDuomenys = Vartotojas::all()
            ->where("id_Vartotojas",$vartotojoID)
            ->first();
        if($prisijungusioDuomenys->ElPastas != $ElPastas)
        {
            foreach($visiVartotojai as $pastas)
            {
                if($pastas->ElPastas == $ElPastas)
                {
                    return redirect('settings2')->with('danger', 'Pašto adresas jau panaudotas!');
                }
            }
        }

        if(empty($Naujienos))
        {
            $Naujienos = 0;
        }

        $rules = [
            'vardas' => 'required|string|min:2|max:255',
            'pavarde' => 'required|string|min:2|max:255',
            'pastoddresas' => 'required|email|min:5|max:255',
            'slaptazodis' => 'required|string|min:5|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('settings2')->with('danger', 'Yra padaryta klaidų!');
        }

        $vartotojas = Vartotojas::all()
            ->where("id_Vartotojas",$vartotojoID)
            ->first();
        $vartotojas -> Vardas = $Vardas;
        $vartotojas -> Pavarde = $Pavarde;
        $vartotojas -> ElPastas = $ElPastas;
        $vartotojas -> Slaptazodis = $Slaptazodis;
        $vartotojas->save();

        return redirect('settings2')->with('success', 'Sėkmingai pakeisti duomenys!');
    }
}
