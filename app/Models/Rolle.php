<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rolle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function rolle(){
        return $this->belongsTo(User::class);
    }
}
