<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'name',
        'city_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function buses()
    {
        return $this->hasMany(Bus::class);
    }

         public function routes()
    {
        return $this->hasMany(Route::class);

    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}
