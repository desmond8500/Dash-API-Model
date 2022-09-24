<?php

namespace App\Repositories;

use App\Models\Priority;
use App\Repositories\BaseRepository;

/**
 * Class PriorityRepository
 * @package App\Repositories
 * @version September 24, 2022, 10:31 am UTC
*/

class PriorityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'level'
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
        return Priority::class;
    }
}
