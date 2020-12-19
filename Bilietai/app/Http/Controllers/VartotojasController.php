<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Krepselis;
use App\Models\Pardavejas;
use App\Models\Pirkejas;
use App\Models\Vartotojas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VartotojasController extends Controller
{
    //
    public function loginload()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $ElPastas = $request->input("pastoAdresas");
        $Slaptazodis = $request->input("slaptazodis");

        $data = Vartotojas::all()
            ->where("ElPastas",$ElPastas)
            ->first();

        if($data != null) {
            $gautas = $data->Slaptazodis;

            if ($gautas == $Slaptazodis) {
                session(['id'=>$data->id_Vartotojas]);
                session(['tipas'=>$data->Tipas]);

                return redirect('/')->with('success', 'Sėkmingai prisijungta!');

            } else {
                return redirect('login')->with('danger', 'Neteisingi prisijungimo duomenys!');
            }
        }
        else {
            return redirect('login')->with('danger', 'Neteisingi prisijungimo duomenys!');
        }
    }
    public function logout()
    {
        session()->forget('id');
        session()->forget('tipas');
        return redirect('/')->with('atsijungeTeisingai', 'Sėkmingai atsijungta!');
    }
    public function registerload()
    {
        return view('register');
    }
    public function registerNew(Request $request){

        $ElPastas = $request->input("pastas");
        $Slaptazodis = $request->input("slaptazodis");
        $Tipas = $request->input("tipas");

        $rules = [
            'pastas' => 'required|email|max:255',
            'slaptazodis' => 'required|string|min:5|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('register')
                ->withInput()
                ->withErrors($validator);
        }

        $vartotojai = Vartotojas::all();

        foreach($vartotojai as $pastas)
        {
            if($pastas->ElPastas == $ElPastas)
            {
                return redirect('register')->with('tokspatspastoadresas', 'Pašto adresas jau panaudotas!');
            }
        }

        switch($Tipas)
        {
//          Adminas
            case '1':
                $vartotojas = new Vartotojas();

                $vartotojas->ElPastas = $ElPastas;
                $vartotojas->Slaptazodis = $Slaptazodis;
                $vartotojas->Tipas = 1;
                $vartotojas->save();
                break;
//          Pardavejas
            case '2':
                $vartotojas = new Vartotojas();

                $vartotojas->ElPastas = $ElPastas;
                $vartotojas->Slaptazodis = $Slaptazodis;
                $vartotojas->Tipas = 2;
                $vartotojas->save();
                break;
//          Vartotojas
            case '3':
                $vartotojas = new Vartotojas();
                $pirkejas = new Pirkejas();
                $krepselis = new Krepselis();

                $vartotojas->ElPastas = $ElPastas;
                $vartotojas->Slaptazodis = $Slaptazodis;
                $vartotojas->Tipas = 3;
                $vartotojas->save();
                $vartotojoID = $vartotojas->id_Vartotojas;

                $pirkejas->fk_Vartotojasid_Vartotojas = $vartotojoID;
                $pirkejas->save();
                $pirkejoID = $pirkejas->id_Pirkejas;

                $krepselis->fk_Pirkejasid_Pirkejas = $pirkejoID;
                $krepselis->save();
                break;
        }

        return redirect('/')->with('success', 'Sėkmingai priregistruota!');
    }
}
