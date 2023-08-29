<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cat_id',
        'eventname',
        'date',
        'venue',
        'desc',
        'time',
        'status',
        'image',
    ];
}
