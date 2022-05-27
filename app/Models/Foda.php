<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foda extends Model
{
    use HasFactory;
    public $table = 'foda';

    protected $fillable = [
        'name',
    ];

}
