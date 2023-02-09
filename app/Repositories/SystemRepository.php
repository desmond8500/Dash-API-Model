<?php

namespace App\Repositories;

use App\Models\System;
use App\Repositories\BaseRepository;

/**
 * Class SystemRepository
 * @package App\Repositories
 * @version February 9, 2023, 10:10 pm UTC
*/

class SystemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'projet_id',
        'invoice_id',
        'name',
        'description'
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
        return System::class;
    }
}
