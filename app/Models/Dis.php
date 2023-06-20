<?php

namespace App\Models;

use App\Http\Controllers\EnginController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dis extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'dis';
    protected $primaryKey = 'id_dis';
    public $timestamps = true ;
    protected $dates = ['date_intervention'] ;

    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id_client');
    }

    public function engin(){
        return $this->hasOne(Engin::class, 'engin_id', 'id_engin');
    }

}
