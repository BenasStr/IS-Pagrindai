<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atsiliepimas extends Model
{
    protected $table = 'atsiliepimas';
    protected $fillable = ['Ivertinimas', 'Aprasymas', 'SukurimoData', 'fk_Renginysid_Renginys', 'fk_Pardavejasid_Pardavejas'];
    protected $primaryKey = 'id_Atsiliepimas';

    public $timestamps = false;
}
