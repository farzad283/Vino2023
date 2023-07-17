<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cellar;
use App\Models\Country;
use App\Models\Type;

class UnlistedBottle extends Model
{
    use HasFactory;
    protected $table = 'unlisted_bottles';
    protected $fillable = [
        'name',
        'type_id',
        'image',
        'country_id',
        'price',
        'url_image',
        'description',
        'format',
        'vintage'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function cellar()
    {
        return $this->belongsToMany(Cellar::class, 'bottle_in_cellars')
            ->withPivot('quantity');
    }
}
