<?php

namespace App\Repositories;

use App\Models\ReportSection;
use App\Repositories\BaseRepository;

/**
 * Class ReportSectionRepository
 * @package App\Repositories
 * @version October 19, 2022, 11:18 pm UTC
*/

class ReportSectionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'report_id',
        'title',
        'description',
        'order'
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
        return ReportSection::class;
    }
}
