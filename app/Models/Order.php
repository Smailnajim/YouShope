<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prix_order',
        'number_items',
        'status',
        'addres_id',
    ];
    

    public function products(){
        return $this->belongsToMany(Produit::class, 'order_produit')->withPivot('prix_total_produit', 'number_items_produit');
    }
}
