<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renginys;
use App\Models\Atsiliepimas;
use App\Models\Vartotojas;
use App\Models\Bilietas;
use App\Models\Istorija;
use Illuminate\Support\Facades\Validator;

class RenginysController extends Controller
{
    public function getAllEvents() {
        $events = Renginys::orderBy('Prioritetas', 'desc')->where('Prioritetas', '!=', '0')->get();
        $count = $events->count();
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

    public function atidarytilanga(){
        return view('renginiai');
    }

    public function rkurimas(Request $request){

        $rules= [
            'LaisvuVietuSkaicius'=> 'required|numeric|min:0|max:5000',
            'Data'=> 'date',
            'Aprasymas' => 'required|string|max:255',
            'Miestas' => 'required|string|max:255',
            'Adresas' => 'required|string|max:255',
            'Pavadinimas' => 'required|string|max:255',
            'NuolaidosKodai' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('renginiulangas')->with('danger', 'Nepavyko sukurti renginio');
        }

        $Data = $request->input("Data");
        $Aprasymas = $request->input("Aprasymas");
        $Miestas = $request->input("Miestas");
        $Adresas = $request->input("Adresas");
        $Pavadinimas = $request->input("Pavadinimas");
        $LaisvuVietuSkaicius = $request->input("LaisvuVietuSkaicius");
        $PradziosLaikas = $request->input("PradziosLaikas");
        $PabaigosLaikas = $request->input("PabaigosLaikas");
        $NuolaidosKodai = $request->input("NuolaidosKodai");

        $renginys=new Renginys;
        $renginys->Data=$Data;
        $renginys->Aprasymas= $Aprasymas;
        $renginys->Prioritetas=1;
        $renginys->Miestas=$Miestas;
        $renginys->Adresas=$Adresas;
        $renginys->Pavadinimas=$Pavadinimas;
        $renginys->LaisvuVietuSkaicius=$LaisvuVietuSkaicius;
        $renginys->Ivertinimas=0;
        $renginys->PradziosLaikas=$PradziosLaikas;
        $renginys->PabaigosLaikas=$PabaigosLaikas;
        $renginys->NuolaidosKodai=$NuolaidosKodai;
        $renginys->fk_Pardavejasid_Pardavejas=session()->get('id');
        $renginys->save(); return redirect('/')->with('success', 'Pavyko sukurti renginį');
    }

    public function rredagavimas($id){
        $redaguojamas=Renginys::where('id_Renginys',$id)->first();
        return view('renginioredagavimas')->with('renginys',$redaguojamas);
    }

    public function naujinimas(Request $request,$id){

        $rules= [
            'LaisvuVietuSkaicius'=> 'required|numeric|min:0|max:5000',
            'Data'=> 'date',
            'Aprasymas' => 'required|string|max:255',
            'Miestas' => 'required|string|max:255',
            'Adresas' => 'required|string|max:255',
            'Pavadinimas' => 'required|string|max:255',
            'NuolaidosKodai' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('renginiulangas')->with('danger', 'Nepavyko redaguoti renginio');
        }

        $redaguojamas=Renginys::where('id_Renginys',$id)->first();
        $redaguojamas->Aprasymas=$request['Aprasymas'];
        $redaguojamas->Data=$request['Data'];
        $redaguojamas->Miestas=$request['Miestas'];
        $redaguojamas->Adresas=$request['Adresas'];
        $redaguojamas->Pavadinimas=$request['Pavadinimas'];
        $redaguojamas->LaisvuVietuSkaicius=$request['LaisvuVietuSkaicius'];
        $redaguojamas->Pavadinimas=$request['Pavadinimas'];
        $redaguojamas->PradziosLaikas=$request['PradziosLaikas'];
        $redaguojamas->PabaigosLaikas=$request['PabaigosLaikas'];
        $redaguojamas->NuolaidosKodai=$request['NuolaidosKodai'];
        $redaguojamas->save(); return redirect('/')->with('success', 'Pavyko redaguoti renginį');
    }

    public function delete($id){
        Istorija::where('fk_Renginysid_Renginys',$id)->delete();
        Bilietas::where('fk_Renginysid_Renginys',$id)->delete();
        Atsiliepimas::where('fk_Renginysid_Renginys',$id)->delete();
        Renginys::where('id_Renginys',$id)->delete();
        return redirect('/')->with('success', 'Pavyko pašalinti renginį');
    }

    public function kurtinuolaida(Request $request,$id){
        Renginys::where('id_Renginys',$id)->update(array('NuolaidosKodai'=>$request['NuolaidosKodai']));
        return redirect('/')->with('success', 'Pavyko sukurti kodą');
    }

    public function nuolaidoslangas($id){
        return view('nuolaida')->with('id',$id);
    }

}
