<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Atsiliepimas;
use App\Models\Istorija;
use App\Models\Pirkejas;
use App\Models\Vartotojas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IstorijaController extends Controller
{
    public function rodytiIstorija()
    {
        $VartotojoID = session()->get('id');
        $VartotojoTipas = session()->get('tipas');

        $data = Pirkejas::all()
            ->where("fk_Vartotojasid_Vartotojas",$VartotojoID)
            ->first();

        $pirkejoID = $data->id_Pirkejas;

        $istorija = Istorija::all()
            ->where("fk_Pirkejasid_Pirkejas",$pirkejoID);

        return view('Istorija/showHistory',compact('istorija'));
    }

    public function perziuretiDetaliau(Request $request)
    {
        $IstorijosID = $request->input("id");

        $istorija = Istorija::all()
            ->where("id_Istorija",$IstorijosID)
            ->first();

        return view('Istorija/showHistoryDetailed',compact('istorija'));
    }

    public function atsiliepimai(Request $request)
    {
        $renginioID = $request->input("id");
        $VartotojoID = session()->get('id');
        $VartotojoTipas = session()->get('tipas');

        $data = Pirkejas::all()
            ->where("fk_Vartotojasid_Vartotojas",$VartotojoID)
            ->first();

        $pirkejoID = $data->id_Pirkejas;

        $atsiliepimas = Atsiliepimas::all()
            ->where("fk_Renginysid_Renginys",$renginioID)
            ->where("fk_Pirkejasid_Pirkejas",$pirkejoID)
            ->first();

        if(empty($atsiliepimas))
        {
            return view('Istorija/kurtiatsiliepima',compact(['pirkejoID','renginioID']));
        }

        return view('Istorija/atsiliepimai',compact('atsiliepimas'));
    }

    public function naujasAtsiliepimas(Request $request)
    {

        $rules = [
            'ivertinimas' => 'required|numeric|min:0|max:5',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('Istorija')->with('danger', 'Neteisingai įvesti duomenys!');
        }

        $atsiliepimas = new Atsiliepimas();

        $atsiliepimas->Ivertinimas = $request->input("ivertinimas");
        $atsiliepimas->Aprasymas = $request->input("aprasymas");
        $atsiliepimas->SukurimoData = Carbon::now();
        $atsiliepimas->fk_Pirkejasid_Pirkejas = $request->input("pirkejas");
        $atsiliepimas->fk_Renginysid_Renginys =$request->input("renginys");
        $atsiliepimas->fk_Pardavejasid_Pardavejas =1;
        $atsiliepimas->save();
        return redirect('Istorija')->with('success', 'Tesingai įvesti duomenys!');

    }
}
