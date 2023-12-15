<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Territory extends Model
{
    use HasFactory;
    protected $fillable = ['territory_name','region_name', 'zone_id', 'zone_long_name','region_id'];

    public function zone() {
        return $this->belongsTo(Zone::class, 'zone_id');
    }

    public function region() {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
