<?php

namespace App\Repositories;

use App\Models\Interet;
use App\Repositories\BaseRepository;

/**
 * Class InteretRepository
 * @package App\Repositories
 * @version January 26, 2023, 9:14 pm UTC
*/

class InteretRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'personne_id',
        'nom'
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
        return Interet::class;
    }
}
