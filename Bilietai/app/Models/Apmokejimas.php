<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apmokejimas extends Model
{
    protected $table = 'apmokejimas';
    public $fillable = ['ApmokejimoData', 'Suma', 'ApmokejimoBudas'];
    protected $primaryKey = 'id_Apmokejimas';

    public $timestamps = false;
}
