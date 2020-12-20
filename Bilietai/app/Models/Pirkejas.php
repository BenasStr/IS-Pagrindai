<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pirkejas extends Model
{
    protected $table = 'pirkejas';
    protected $fillable = ['Taskai', 'NaujienlaiskioPrenumerata', 'Amzius', 'TelefonoNumeris', 'Lytis', 'fk_Vartotojasid_Vartotojas', 'fk_Apmokejimasid_Apmokejimas'];
    protected $primaryKey = 'id_Pirkejas';
    public $timestamps = false;

    public function vartotojas(){
        return $this->belongsTo(Vartotojas::class, 'fk_Vartotojasid_Vartotojas');
    }

    public function atsiliepimas() {
        return $this->hasMany(Atsiliepimas::class, 'fk_Pirkejasid_Pirkejas');
    }
}
