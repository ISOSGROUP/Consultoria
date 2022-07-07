<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Curriculum
 * @package App\Models
 * @version July 7, 2022, 4:05 pm UTC
 *
 * @property string $education
 * @property string $training
 * @property string $work_experience
 * @property string $certificates
 * @property string $dni_frontal_posterior
 * @property string $antecedentes
 */
class Curriculum extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'curricula';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'education',
        'training',
        'work_experience',
        'certificates',
        'dni_frontal_posterior',
        'antecedentes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'education' => 'string',
        'training' => 'string',
        'work_experience' => 'string',
        'certificates' => 'string',
        'dni_frontal_posterior' => 'string',
        'antecedentes' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
