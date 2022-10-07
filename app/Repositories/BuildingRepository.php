<?php

namespace App\Repositories;

use App\Models\Building;
use App\Repositories\BaseRepository;

/**
 * Class BuildingRepository
 * @package App\Repositories
 * @version October 7, 2022, 6:11 pm UTC
*/

class BuildingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'projet_id',
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
        return Building::class;
    }
}
