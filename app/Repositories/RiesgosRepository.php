<?php

namespace App\Repositories;

use App\Models\Riesgos;
use App\Repositories\BaseRepository;

/**
 * Class RiesgosRepository
 * @package App\Repositories
 * @version June 7, 2022, 3:27 pm UTC
*/

class RiesgosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'risk_chance_radio',
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
        return Riesgos::class;
    }
}
