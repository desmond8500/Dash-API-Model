<?php

namespace App\Repositories;

use App\Models\Fichier;
use App\Repositories\BaseRepository;

/**
 * Class FichierRepository
 * @package App\Repositories
 * @version February 13, 2023, 10:34 pm UTC
*/

class FichierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'folder',
        'type'
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
        return Fichier::class;
    }
}
