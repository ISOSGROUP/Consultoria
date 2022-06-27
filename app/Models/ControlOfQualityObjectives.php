<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ControlOfQualityObjectives
 * @package App\Models
 * @version June 13, 2022, 4:07 pm UTC
 *
 * @property string $quality_politics
 * @property string $objectives
 * @property string $indicator
 * @property string $formula
 * @property string $measurement_frequency
 * @property string $goals
 * @property string $status_to_date
 * @property string $responsible_for_providing_data
 * @property string $activities
 * @property string $resources
 * @property string $responsible
 * @property string $plazo
 * @property string $effectiveness_verification
 */
class ControlOfQualityObjectives extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'control_of_quality_objectives';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'quality_politics',
        'objectives',
        'indicator',
        'formula',
        'measurement_frequency',
        'month_list',
        'bueno',
        'regular_1',
        'regular_2',
        'malo',
        'goals',
        'status_to_date',
        'responsible_for_providing_data',
        'activities',
        'resources',
        'responsible',
        'plazo',
        'effectiveness_verification'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'quality_politics' => 'string',
        'objectives' => 'string',
        'indicator' => 'string',
        'formula' => 'string',
        'measurement_frequency' => 'string',
        'month_list'=>'string',
        'goals' => 'string',
        'status_to_date' => 'string',
        'responsible_for_providing_data' => 'string',
        'activities' => 'string',
        'resources' => 'string',
        'responsible' => 'string',
        'plazo' => 'string',
        'effectiveness_verification' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'quality_politics' => 'required'
    ];

    
}
