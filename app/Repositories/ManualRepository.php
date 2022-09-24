<?php

namespace App\Repositories;

use App\Models\Manual;
use App\Repositories\BaseRepository;

/**
 * Class ManualRepository
 * @package App\Repositories
 * @version September 24, 2022, 10:30 am UTC
*/

class ManualRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type',
        'file'
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
        return Manual::class;
    }
}
