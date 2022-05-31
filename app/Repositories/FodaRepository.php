<?php

namespace App\Repositories;

use App\Models\Foda;
use App\Models\User;
use App\Repositories\BaseRepository;
use Hash;
use DB;


/**
 * Class FodaRepository.
 */

class FodaRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
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
    public function model(){

        return Foda::class;
    }
}
