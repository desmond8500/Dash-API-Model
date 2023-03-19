<?php

namespace App\Repositories;

use App\Models\Planning;
use App\Repositories\BaseRepository;

/**
 * Class PlanningRepository
 * @package App\Repositories
 * @version March 19, 2023, 3:29 am UTC
*/

class PlanningRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'batiment_id',
        'system_id',
        'tache',
        'date',
        'Etat'
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
        return Planning::class;
    }
}
