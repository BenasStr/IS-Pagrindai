<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saskaita extends Model
{
    protected $table = 'saskaita';
    protected $fillable = ['SaskaitosNr', 'Suma', 'Data', 'fk_Pardavejasid_Pardavejas', 'fk_Apmokejimasid_Apmokejimas'];
    protected $primaryKey = 'id_Saskaita';
    public $timestamps = false;
}
