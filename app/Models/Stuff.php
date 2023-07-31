<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{       
    protected $fillable = ['id','name' ,'image', 'type', 'price', 'planting_date', 'availability'];
    protected $table = 'stuffs';

    use HasFactory;
}