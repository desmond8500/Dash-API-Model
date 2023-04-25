<?php

namespace App\Repositories;

use App\Models\Fiche;
use App\Repositories\BaseRepository;

/**
 * Class FicheRepository
 * @package App\Repositories
 * @version April 9, 2023, 6:38 pm UTC
*/

class FicheRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'projet_id',
        'fiche_type_id'
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
        return Fiche::class;
    }
}
