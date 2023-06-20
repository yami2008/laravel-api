<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'clients';
    protected $primaryKey = 'id_client';
    public $timestamps = true ;

    public function engins(){
        return $this->hasMany(Engin::class, 'client_id', 'id_client');
    }

    public function demandesInterventionService(){
        return $this->hasMany(Dis::class, 'client_id', 'id_client');
    }


}
