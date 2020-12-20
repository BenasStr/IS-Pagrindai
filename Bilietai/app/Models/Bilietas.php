<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilietas extends Model
{
    protected $table = 'bilietas';
    protected $fillable = ['BilietoNr', 'Kaina', 'Vieta', 'Aprasymas', 'Data', 'fk_Krepselisid_Krepselis', 'fk_Pardavejasid_Pardavejas', 'fk_Renginysid_Renginys'];
    protected $primaryKey = 'id_Bilietas';

    public $timestamps = false;

    public function krepselis() {
        return $this->belongsTo(Krepselis::class, 'fk_Krepselisid_Krepselis');
    }

    public function renginys() {
        return $this->belongsTo(Renginys::class, 'fk_Renginysid_Renginys');
    }
}
