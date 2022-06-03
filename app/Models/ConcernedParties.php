<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ConcernedParties
 * @package App\Models
 * @version June 3, 2022, 2:56 pm UTC
 *
 * @property string $type
 * @property string $concerned_parties
 * @property string $needs
 * @property string $Expectations
 * @property string $form_of_fulfillment
 * @property string $related_legal_requirements
 */
class ConcernedParties extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'concerned_parties';
    

    //protected $dates = ['deleted_at'];



    public $fillable = [
        'type',
        'concerned_parties',
        'needs',
        'Expectations',
        'form_of_fulfillment',
        'related_legal_requirements'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'type' => 'string',
        'concerned_parties' => 'string',
        'needs' => 'string',
        'Expectations' => 'string',
        'form_of_fulfillment' => 'string',
        'related_legal_requirements' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
