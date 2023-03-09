<?php

namespace App\Repositories;

use App\Models\Tache;
use App\Repositories\BaseRepository;

/**
 * Class TacheRepository
 * @package App\Repositories
 * @version January 26, 2023, 10:03 pm UTC
*/

class TacheRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nom',
        'description',
        'experience_id'
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
        return Tache::class;
    }
}
