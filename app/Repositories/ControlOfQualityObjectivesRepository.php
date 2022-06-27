<?php

namespace App\Repositories;

use App\Models\ControlOfQualityObjectives;
use App\Repositories\BaseRepository;

/**
 * Class ControlOfQualityObjectivesRepository
 * @package App\Repositories
 * @version June 13, 2022, 4:07 pm UTC
*/

class ControlOfQualityObjectivesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'quality_politics',
        'objectives',
        'indicator',
        'formula',
        'measurement_frequency',
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ControlOfQualityObjectives::class;
    }
}
