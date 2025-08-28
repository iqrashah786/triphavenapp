<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{

    use HasFactory;
    protected $primaryKey = 'route_id';
    protected $fillable =[
        'route_name',
        'station_id',
        'fare',
        'time',
        'date',
    ];

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
