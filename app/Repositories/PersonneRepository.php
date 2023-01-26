<?php

namespace App\Repositories;

use App\Models\Personne;
use App\Repositories\BaseRepository;

/**
 * Class PersonneRepository
 * @package App\Repositories
 * @version January 26, 2023, 9:04 pm UTC
*/

class PersonneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'prenom',
        'nom',
        'fonction',
        'tel',
        'adresse',
        'email',
        'profile'
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
        return Personne::class;
    }
}
