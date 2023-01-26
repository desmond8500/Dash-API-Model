<?php

namespace App\Repositories;

use App\Models\Langue;
use App\Repositories\BaseRepository;

/**
 * Class LangueRepository
 * @package App\Repositories
 * @version January 26, 2023, 9:13 pm UTC
*/

class LangueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personne_id',
        'nom',
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
        return Langue::class;
    }
}
