<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vartotojas;
use App\Models\Renginys;
use App\Models\Pardavejas;
use App\Models\Atsiliepimas;

use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function settings()
    {
        $vartotojoID = session()->get('id');
        $tipas = session()->get('tipas');

        $data = Vartotojas::all()
            ->where("id_Vartotojas",$vartotojoID)
            ->first();
        return view('Settings/adminSettings',compact(array('data')));
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

    public function indexAdmin(){

        return view('AdminViews/index');
    }

    public function getEventsAdmin(){
        $events = Renginys::all();
        return view('AdminViews/eventsAdmin', compact('events'));
    }

    public function getUsersAdmin(){
        $pirkejai = Vartotojas::with('pirkejas')->where('Tipas', 3)->get();
        $pardavejai = Vartotojas::with('pardavejas')->where('Tipas', 2)->get();
        return view('AdminViews/usersAdmin', compact('pirkejai', 'pardavejai'));
    }

    public function promoteEventAdmin(Request $request){
        $event = Renginys::all()
            ->where('id_Renginys', $request->input('renginiuKelimas'))
            ->first();

        $event -> Prioritetas = 11;
        $event -> save();
        return redirect('admin/getEvents')->with('success', 'Sėkmingai iškeltas');
    }

    public function blockEventAdmin(Request $request){
        $event = Renginys::all()
            ->where('id_Renginys', $request->input('renginiuBlokavimas'))
            ->first();

        $event -> Prioritetas = 0;
        $event -> save();
        return redirect('admin/getEvents')->with('success', 'Sėkmingai blokuotas');
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
        return redirect('/admin/unconfirmedAccounts')->with('success', 'Paskyra sėkmingai patvirtinta');
    }

    public function getDataForEditPirkejasAdmin(Request $request){
        $user = Vartotojas::with('pirkejas')
            ->where('id_Vartotojas', $request->input('editUserPirkejas'))
            ->get()
            ->first();

        return view('/AdminViews/editPirkejasAdmin', compact('user'));
    }

    public function confirmEditPirkejas(Request $request){
        $rules = [
            'createDate' => 'date',
            'password' => 'required|string|min:5|max:15'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect('/admin/getUsers')->with('danger', 'Blogi duomenys!');
        }
        $user = Vartotojas::with('pirkejas')
            ->where('id_Vartotojas', $request->input('id'))
            ->get()
            ->first();
        $user->Slaptazodis = $request->input('password');
        $user->SukurimoData = $request->input('createDate');
        $user->save();
        if ($user->pirkejas != null){
            $user->pirkejas["Taskai"] = $request->input('points');
            $user->pirkejas->save();
        }
        return redirect('/admin/getUsers')->with('success', 'Redagavimas sėkmingas');;
    }

    public function deleteUserPirkejasAdmin(Request $request){
        $user = Vartotojas::with('pirkejas')
            ->where('id_Vartotojas', $request->input('deleteUserPirkejas'))
            ->get()
            ->first();
        if ($user->pirkejas != null)
            $user->pirkejas->delete();
        $user->delete();
        return redirect('/admin/getUsers')->with('success', 'Sėkmingai ištrinta');
    }

    public function getDataForEditPardavejasAdmin(Request $request){
        $user = Vartotojas::with('pardavejas')
            ->where('id_Vartotojas', $request->input('editUserPardavejas'))
            ->get()
            ->first();
        return view('/AdminViews/editPardavejasAdmin', compact('user'));
    }

    public function confirmEditPardavejas(Request $request){
        $rules = [
            'createDate' => 'date',
            'password' => 'required|string|min:5|max:15',
            'code' =>'required|string|min:5|max:20',
            'rating' => 'numeric',
            'eventNum' => 'numeric'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect('/admin/getUsers')->with('danger', 'Blogi duomenys!');
        }

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
        $user->pardavejas->save();
        return redirect('/admin/getUsers')->with('success', 'Redagavimas sėkmingas');
    }

    public function deleteUserPardavejasAdmin(Request $request){
        $user = Vartotojas::where('id_Vartotojas', $request->input('deleteUserPirkejas'))->get()->first();
        $user->delete();
        return redirect('/admin/getUsers')->with('success', 'Sėkmingai ištrinta');
    }

    public function getFilteredUsersAdmin(Request $request){
        $key = "/".$request->input('searchAdmin')."/i";
        $allUsers = Vartotojas::all();
        //echo $allUsers;
        $usersPirkejai = array();
        $usersPardavejai = array();
        foreach ($allUsers as $user){
            //echo $user."\n";
            $name = $user->Vardas;
            $surname = $user->Pavarde;
            if(preg_match($key, $name) or preg_match($key, $surname)){ //or preg_match($key, $surname)

                if ($user->Tipas == 2)
                    array_push($usersPardavejai, $user);

                if ($user->Tipas == 3)
                    array_push($usersPirkejai, $user);
            }
        }
        $countPirkejai = count($usersPirkejai);
        $countPardavejai = count($usersPardavejai);
        return view('/AdminViews/filteredUsersAdmin', compact(['usersPirkejai', 'usersPardavejai', 'countPirkejai', 'countPardavejai']));
    }

    public function getReviewAdmin(Request $request){
        $reviews = Renginys::with('atsiliepimas')->where('id_Renginys', $request->input('renginioAtsiliepimai'))->get()->first();
        $count = count($reviews->atsiliepimas);
        return view('AdminViews/eventReviews', compact('reviews', 'count'));

    }

    public function deleteReviewsAdmin(Request $request){
        $review = Atsiliepimas::where('id_Atsiliepimas', $request->input('deleteReview'))->get()->first();
        $review->delete();
        return redirect('admin/getEvents')->with('success', 'Sėkmingai ištrinta');
    }
}
