<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engin extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'engins';
    protected $primaryKey = 'id_engin';
    public $timestamps = true ;

    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id_client');
    }

    public function demandeInterventionService(){
        return $this->belongsTo(Dis::class, 'engin_id', 'id_engin');
    }

}
