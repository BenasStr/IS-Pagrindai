<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bilietas;
use Illuminate\Support\Facades\Validator;

class BilietasController extends Controller
{
    public function getTickets() {

    }

    public function atidarytilangab($id){
        $bilietas=Bilietas::where('fk_Renginysid_Renginys',$id)->first();
        return view('bilietai')->with('id',$id)->with('bilietas',$bilietas);
    }

    public function bkurimas(Request $request, $id){

        $rules= [
            'BilietoNr'=> 'required|numeric|min:0|max:5000',
            'Data'=> 'date',
            'Aprasymas' => 'required|string|max:255',
            'Vieta' => 'required|string|max:255',
            'Kaina' => 'required|numeric|min:0|max:5000',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('bilietulangas/'.$id)->with('danger', 'Nepavyko sukurti bilieto');
        }

        Bilietas::where('fk_Renginysid_Renginys',$id)->delete();
        $bilietas=new Bilietas();
        $bilietas->BilietoNr=$request['BilietoNr'];
        $bilietas->Kaina=$request['Kaina'];
        $bilietas->Vieta=$request['Vieta'];
        $bilietas->Aprasymas=$request['Aprasymas'];
        $bilietas->Data=$request['Data'];
        $bilietas->fk_Pardavejasid_Pardavejas=session()->get('id');
        $bilietas->fk_Renginysid_Renginys=$id;

        $bilietas->save();


        return redirect('/')->with('success', 'Pavyko sukurti bilietą');
    }
}
