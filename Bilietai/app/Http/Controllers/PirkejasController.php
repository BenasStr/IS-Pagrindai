<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pirkejas;
use App\Models\Vartotojas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PirkejasController extends Controller
{
    public function settings()
    {
        $vartotojoID = session()->get('id');
        $tipas = session()->get('tipas');

        $data = Vartotojas::all()
            ->where("id_Vartotojas",$vartotojoID)
            ->first();

        $pirkejoData = Pirkejas::all()
            ->where("fk_Vartotojasid_Vartotojas",$vartotojoID)
            ->first();


        return view('Settings/clientSettings',compact(array('data','pirkejoData')));
    }

    public function keistiDuomenis(Request $request)
    {
        $vartotojoID = session()->get('id');
        $tipas = session()->get('tipas');


        $Vardas = $request->input("vardas");
        $Pavarde = $request->input("pavarde");
        $ElPastas = $request->input("pastoddresas");
        $Slaptazodis = $request->input("slaptazodis");
        $Amzius = $request->input("amzius");
        $TelefonoNumeris = $request->input("telnr");
        $Lytis = $request->input("lytis");
        $Naujienos = $request->input("naujienlaiskis");

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
                    return redirect('settings3')->with('danger', 'Pašto adresas jau panaudotas!');
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
            'amzius' => 'required|numeric|min:1|max:130',
            'telnr' => 'required|string|min:5|max:12',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('settings3')->with('danger', 'Yra padaryta klaidų!');
        }

        $vartotojas = Vartotojas::all()
            ->where("id_Vartotojas",$vartotojoID)
            ->first();
        $vartotojas -> Vardas = $Vardas;
        $vartotojas -> Pavarde = $Pavarde;
        $vartotojas -> ElPastas = $ElPastas;
        $vartotojas -> Slaptazodis = $Slaptazodis;
        $vartotojas->save();


        $pirkejas = Pirkejas::all()
            ->where("fk_Vartotojasid_Vartotojas",$vartotojoID)
            ->first();
        $pirkejas -> Amzius = $Amzius;
        $pirkejas -> TelefonoNumeris = $TelefonoNumeris;
        $pirkejas -> Lytis = $Lytis;
        $pirkejas -> NaujienlaiskioPrenumerata = $Naujienos;

        $pirkejas->save();

        return redirect('settings3')->with('success', 'Sėkmingai pakeisti duomenys!');
    }
}
