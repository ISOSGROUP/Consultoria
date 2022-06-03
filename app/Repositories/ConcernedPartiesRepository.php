<?php

namespace App\Repositories;

use App\Models\ConcernedParties;
use App\Repositories\BaseRepository;

/**
 * Class ConcernedPartiesRepository
 * @package App\Repositories
 * @version June 3, 2022, 3:02 pm UTC
*/

class ConcernedPartiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return ConcernedParties::class;
    }
}
