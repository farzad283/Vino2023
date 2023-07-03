<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BottleInCellar extends Model
{
    use HasFactory;
    protected $table = 'bottles_in_cellars';
    protected $fillable = [
        'bottle_id',
        'cellar_id',
        'quantity'
    ];


    public function bottle(){
        return $this->belongsTo(Bottle::class);
    }

    public function cellar(){
        return $this->belongsTo(Cellar::class);
    }
}
