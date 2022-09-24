<?php

namespace App\Repositories;

use App\Models\Storage;
use App\Repositories\BaseRepository;

/**
 * Class StorageRepository
 * @package App\Repositories
 * @version September 24, 2022, 10:40 am UTC
*/

class StorageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'area'
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
        return Storage::class;
    }
}
