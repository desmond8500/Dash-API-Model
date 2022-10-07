<?php

namespace App\Repositories;

use App\Models\Projet;
use App\Repositories\BaseRepository;

/**
 * Class ProjetRepository
 * @package App\Repositories
 * @version October 7, 2022, 5:34 pm UTC
*/

class ProjetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_id',
        'name',
        'logo',
        'description',
        'status'
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
        return Projet::class;
    }
}
