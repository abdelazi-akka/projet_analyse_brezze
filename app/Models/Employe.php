<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $table="employes";
    protected $primaryKey="id_employe";
    protected $fillable=['id_employe','cin','nom','prenom','adress','telephone','date_recrutement'];
}
