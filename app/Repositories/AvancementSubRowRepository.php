<?php

namespace App\Repositories;

use App\Models\AvancementSubRow;
use App\Repositories\BaseRepository;

/**
 * Class AvancementSubRowRepository
 * @package App\Repositories
 * @version March 29, 2023, 7:29 am UTC
*/

class AvancementSubRowRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'avancement_row_id',
        'name',
        'start',
        'end',
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
        return AvancementSubRow::class;
    }
}
