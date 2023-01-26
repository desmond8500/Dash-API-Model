<?php

namespace App\Repositories;

use App\Models\Experience;
use App\Repositories\BaseRepository;

/**
 * Class ExperienceRepository
 * @package App\Repositories
 * @version January 26, 2023, 9:10 pm UTC
*/

class ExperienceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personne_id',
        'pays',
        'ville',
        'debut',
        'fin',
        'entreprise'
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
        return Experience::class;
    }
}
