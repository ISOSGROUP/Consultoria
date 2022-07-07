<?php

namespace App\Repositories;

use App\Models\Curriculum;
use App\Repositories\BaseRepository;

/**
 * Class CurriculumRepository
 * @package App\Repositories
 * @version July 7, 2022, 4:05 pm UTC
*/

class CurriculumRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'education',
        'training',
        'work_experience',
        'certificates',
        'dni_frontal_posterior',
        'antecedentes'
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
        return Curriculum::class;
    }
}
