<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vartotojas extends Model
{
    protected $table = 'vartotojas';
    protected $fillable = ['Vardas', 'Pavarde', 'ElPastas', 'Slaptazodis', 'Sukurimodata', 'Tipas', 'fk_Pardavejasid_Pardavejas'];
    protected $primaryKey = 'id_Vartotojas';
    public $timestamps = false;
}
