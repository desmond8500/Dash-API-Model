<?php

namespace App\Repositories;

use App\Models\Personnel;
use App\Repositories\BaseRepository;

/**
 * Class PersonnelRepository
 * @package App\Repositories
 * @version March 4, 2023, 2:31 pm UTC
*/

class PersonnelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'prenom',
        'nom',
        'fonction',
        'statut'
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
        return Personnel::class;
    }
}
