<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Set the 'time' column to the current time
            $model->time = now()->format('H:i:s');
        });
    }
    protected $fillable = [
        'time',
        'region_name',
        'territory_name',
        'distributor_name',
        'po_number',
        'date',
        'total_price'
    ];
}
