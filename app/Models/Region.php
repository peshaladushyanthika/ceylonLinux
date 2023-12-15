<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['region_name', 'zone_id', 'zone_long_name'];

    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id');
    }

    public function territories() {
        return $this->hasMany(Territory::class);
    }
}
