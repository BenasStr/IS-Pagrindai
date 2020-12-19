<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vartotojas;
use Illuminate\Http\Request;

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

                return redirect('/')->with('prisijungeSekmingai', 'Sėkmingai prisijungta!');

            } else {
                return redirect('login')->with('prisijungeNesekmingai', 'Neteisingi prisijungimo duomenys!');
            }
        }
        else {
            return redirect('login')->with('prisijungeNesekmingai', 'Neteisingi prisijungimo duomenys!');
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

    }
}
