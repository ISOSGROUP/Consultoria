<?php

namespace App\Repositories;

use App\Models\test;
use App\Repositories\BaseRepository;

/**
 * Class testRepository
 * @package App\Repositories
 * @version May 10, 2022, 4:55 pm UTC
*/

class testRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'string'
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
        return test::class;
    }
}
