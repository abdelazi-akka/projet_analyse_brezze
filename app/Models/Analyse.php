<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analyse extends Model
{
    use HasFactory;
    protected $table="analyses";
    protected $primaryKey="id_analyse";
    protected $fillable=['abrv','designation','norme','unite','prix'];
    public function clients(){
        return $this->belongsToMany(Client::class,"client_analyse","id_client","id_analyse");
    }

    
}
