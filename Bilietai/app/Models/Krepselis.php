<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krepselis extends Model
{
    protected $table = 'krepselis';
    protected $fillable = ['SukurimoData', 'KrepselioKodas', 'fk_Pirkejasid_Pirkejas'];
    protected $primaryKey = 'id_Krepselis';
    public $timestamps = false;
}
