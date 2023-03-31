<?php

namespace App\Repositories;

use App\Models\AvancementRow;
use App\Repositories\BaseRepository;

/**
 * Class AvancementRowRepository
 * @package App\Repositories
 * @version March 29, 2023, 7:28 am UTC
*/

class AvancementRowRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'int avancement_id',
        'name',
        'progress',
        'comment'
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
        return AvancementRow::class;
    }
}
