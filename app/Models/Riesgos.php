<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Riesgos
 * @package App\Models
 * @version June 7, 2022, 3:27 pm UTC
 *
 * @property string $risk_chance_radio
 * @property string $process
 * @property string $probability
 * @property string $impact
 * @property string $risk_level
 * @property string $interested_part
 * @property string $foda_reference
 * @property string $action_to_take
 * @property string $responsible
 * @property string $resources
 * @property string $execution_time
 * @property string $responsible_for_monitoring
 * @property string $tracking_status
 * @property string $is_effective
 * @property string $comment_on_effectiveness
 */
class Riesgos extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'riesgos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'risk_chance_radio',
        'risk_chance_text',
        'process',
        'probability',
        'impact',
        'risk_level',
        'interested_part',
        'foda_reference',
        'action_to_take',
        'responsible',
        'resources',
        'execution_time',
        'responsible_for_monitoring',
        'tracking_status',
        'is_effective',
        'comment_on_effectiveness'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'risk_chance_radio' => 'string',
        'risk_chance_text' => 'string',
        'process' => 'string',
        'probability' => 'string',
        'impact' => 'string',
        'risk_level' => 'string',
        'interested_part' => 'string',
        'foda_reference' => 'string',
        'action_to_take' => 'string',
        'responsible' => 'string',
        'resources' => 'string',
        'execution_time' => 'date',
        'responsible_for_monitoring' => 'string',
        'tracking_status' => 'string',
        'is_effective' => 'string',
        'comment_on_effectiveness' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
