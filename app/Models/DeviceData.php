<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceData extends Model
{
    use HasFactory;
    
    protected $table = 'device_data';

    protected $fillable = [
        'device_id',
        'temperature',
        'humidity',
        'soil_moisture',
    ];

    public function device()
    {
        return $this->belongsTo(Devices::class, 'device_id', 'uniqid');
    }
}
