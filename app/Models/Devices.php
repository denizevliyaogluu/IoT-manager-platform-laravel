<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    use HasFactory;
    
    protected $table = 'devices';

    protected $fillable = [
        'name',
        'description',
        'image'
    ];
    public function deviceData()
    {
        return $this->hasMany(DeviceData::class, 'device_id', 'uniqid');
    }
}
