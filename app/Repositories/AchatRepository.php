<?php

namespace App\Repositories;

use App\Models\Achat;
use App\Repositories\BaseRepository;

/**
 * Class AchatRepository
 * @package App\Repositories
 * @version November 10, 2022, 12:50 am UTC
*/

class AchatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'date',
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
        return Achat::class;
    }
}
