<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
                            'id',
                           'license_plate',
                          'station_id',
                        ];

    
    public function station()
    {
        return $this->belongsTo(Station::class);
    }
    public function routes()
    {
        return $this->hasMany(Route::class);

    }
}
