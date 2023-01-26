<?php

namespace App\Repositories;

use App\Models\Formation;
use App\Repositories\BaseRepository;

/**
 * Class FormationRepository
 * @package App\Repositories
 * @version January 26, 2023, 9:08 pm UTC
*/

class FormationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personne_id',
        'ecole',
        'diplome',
        'debut',
        'pays',
        'fin',
        'ville'
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
        return Formation::class;
    }
}
