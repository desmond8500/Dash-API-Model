<?php

namespace App\Repositories;

use App\Models\Competence;
use App\Repositories\BaseRepository;

/**
 * Class CompetenceRepository
 * @package App\Repositories
 * @version January 26, 2023, 9:12 pm UTC
*/

class CompetenceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personne_id',
        'competence',
        'niveau'
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
        return Competence::class;
    }
}
