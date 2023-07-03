<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cellar extends Model
{
    use HasFactory;
    protected $table = 'cellars';
    protected $fillable = [
        'name',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    } // user_id est ce que j'ai déclarer plus haut (la clé étrangère), id fait référence à la clé primaire de ce que je viens de déclarer, ici c'est user(La clé primaire est id). 
}
