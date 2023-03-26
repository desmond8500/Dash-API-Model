<?php

namespace App\Repositories;

use App\Models\ReportLink;
use App\Repositories\BaseRepository;

/**
 * Class ReportLinkRepository
 * @package App\Repositories
 * @version March 26, 2023, 5:47 am UTC
*/

class ReportLinkRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'section_id',
        'name',
        'link'
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
        return ReportLink::class;
    }
}
