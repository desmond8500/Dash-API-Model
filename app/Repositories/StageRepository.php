<?php

namespace App\Repositories;

use App\Models\Stage;
use App\Repositories\BaseRepository;

/**
 * Class StageRepository
 * @package App\Repositories
 * @version October 7, 2022, 6:12 pm UTC
*/

class StageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'building_id',
        'name',
        'description'
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
        return Stage::class;
    }
}
