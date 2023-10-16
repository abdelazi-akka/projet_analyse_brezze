<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table="clients";
    protected $primaryKey="id_client";
    protected $fillable=['id_client','cin','nom','prenom','age','telephone','date_inscription'];
    public function analyses(){
        return $this->belongsToMany(Analyse::class,"client_analyse","id_client","id_analyse");
    }

}
