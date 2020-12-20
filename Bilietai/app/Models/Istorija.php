<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Istorija extends Model
{
    protected $table = 'istorija';
    protected $fillable = ['RenginioPavadinimas', 'RenginioData', 'Kaina', 'RenginioVieta', 'BilietoNr', 'RenginioIvertinimas', 'fk_Pirkejasid_Pirkejas','fk_Renginysid_Renginys'];
    protected $primaryKey = 'id_Istorija';
    public $timestamps = false;
}
