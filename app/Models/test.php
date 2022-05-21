<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class test
 * @package App\Models
 * @version May 10, 2022, 4:55 pm UTC
 *
 * @property string $string
 */
class test extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tests';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'string'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'string' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
