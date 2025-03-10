<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'imag',
        'description',
        'prix',
    ];

    public function catigoris(){
        return $this->belongsToMany(Categori::class);
    }
}
