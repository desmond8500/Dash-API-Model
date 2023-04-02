<?php

namespace App\Repositories;

use App\Models\ProjetContact;
use App\Repositories\BaseRepository;

/**
 * Class ProjetContactRepository
 * @package App\Repositories
 * @version April 1, 2023, 10:16 pm UTC
*/

class ProjetContactRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'projet_id',
        'contact_id'
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
        return ProjetContact::class;
    }
}
