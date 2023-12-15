<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $fillable = ['zone_long_name', 'zone_short_name'];

    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
