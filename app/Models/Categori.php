<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categori extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'id_categoris',
        'id_produits',
    ];

    public function Produits(){
        return $this->belongsToMany(Produit::class);
    }
}
