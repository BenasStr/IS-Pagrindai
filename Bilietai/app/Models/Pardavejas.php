<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pardavejas extends Model
{
    protected $table = 'pardavejas';
    protected $fillable = ['ImonesPavadinimas', 'ImonesKodas', 'Adresas', 'ArPatvirtintas', 'Ivertinimas', 'RenginiuSkaicius', 'TelefonoNumeris'];
    protected $primaryKey = 'id_Pardavejas';
    public $timestamps = false;

    public function vartotojas(){
        return $this->hasMany(Vartotojas::class, 'fk_Pardavejasid_Pardavejas');
    }
}
