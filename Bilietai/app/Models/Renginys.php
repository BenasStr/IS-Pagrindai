<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renginys extends Model
{
    protected $table = 'renginys';
    protected $fillable = ['Data', 'Aprasymas', 'Prioritetas', 'Miestas', 'Adresas', 'Pavadinimas', 'LaisvuVietuSkaicius', 'Ivertinimas', 'PradziosLaikas', 'PabaigosLaikas', 'NuolaidosKodai', 'fk_Pardavejasid_Pardavejas'];
    protected $primaryKey = 'id_Renginys';
    public $timestamps = false;

    public function atsiliepimas(){
        return $this->hasMany(Atsiliepimas::class, 'fk_Renginysid_Renginys');
    }
    public function bilietas() {
        return $this->hasMany(Bilietas::class, "fk_Renginysid_Renginys");
    }
}
