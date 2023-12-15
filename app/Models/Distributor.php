<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;
    protected $fillable = ['territory_name','name', 'nic', 'address','mobile','email','territory_id','gender','username','password'];
}
