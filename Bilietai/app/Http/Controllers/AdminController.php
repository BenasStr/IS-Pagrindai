<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vartotojas;
use App\Models\Renginys;
use App\Models\Pardavejas;

class AdminController extends Controller
{
    public function settings()
    {
        return view('Settings/adminSettings');
    }

    public function indexAdmin(){
        return view('AdminViews/index');
    }

    public function getEventsAdmin(){
        $events = Renginys::all();
        return view('AdminViews/eventsAdmin', compact('events'));
    }

    public function getUsersAdmin(){
        $pirkejai = Vartotojas::with('pirkejas')->where('Tipas', 1)->get();
        $pardavejai = Vartotojas::with('pardavejas')->where('Tipas', 2)->get();
        return view('AdminViews/usersAdmin', compact('pirkejai', 'pardavejai'));
    }

    public function promoteEventAdmin(Request $request){
        $event = Renginys::all()
            ->where('id_Renginys', $request->input('renginiuKelimas'))
            ->first();

        $event -> Prioritetas = 11;
        $event -> save();
        return redirect('admin/getEvents');
    }

    public function blockEventAdmin(Request $request){
        $event = Renginys::all()
            ->where('id_Renginys', $request->input('renginiuBlokavimas'))
            ->first();

        $event -> Prioritetas = 0;
        $event -> save();
        return redirect('admin/getEvents');
    }

    public function getUnconfirmedAccounts(){
        $pardavejai = Pardavejas::where('ArPatvirtintas', 0)
            ->get();
        return view('AdminViews/unconfirmedAccountList', compact('pardavejai'));
    }

    public function confirmAccount(Request $request){
        $pardavejas = Pardavejas::where('id_Pardavejas', $request->input('patvirtintiPaskyra'))->first();
        $pardavejas->ArPatvirtintas = 1;
        $pardavejas->save();
        return redirect('/admin/unconfirmedAccounts');
    }

    public function getDataForEditPirkejasAdmin(Request $request){
        $user = Vartotojas::with('pirkejas')
            ->where('id_Vartotojas', $request->input('editUserPirkejas'))
            ->get()
            ->first();

        return view('/AdminViews/editPirkejasAdmin', compact('user'));
    }

    public function deleteUserAdmin(Request $request){

    }

    public function getDataForEditPardavejasAdmin(Request $request){
        $user = Vartotojas::with('pardavejas')
            ->where('id_Vartotojas', $request->input('editUserPardavejas'))
            ->get()
            ->first();
        return view('/AdminViews/editPardavejasAdmin', compact('user'));
    }

    public function confirmEditPardavejas(Request $request){
        //Validacijas padaryt

        $user = Vartotojas::with('pardavejas')
            ->where('id_Vartotojas', $request->input('id'))
            ->get()
            ->first();

        $user->Slaptazodis = $request->input('password');
        $user->SukurimoData = $request->input('createDate');
        $user->pardavejas["ImonesKodas"] = $request->input('code');
        $user->pardavejas["Ivertinimas"] = $request->input('rating');
        $user->pardavejas["RenginiuSkaicius"] = $request->input('eventNum');
        $user->save();
        return view('/AdminViews/usersAdmin');
    }
}
