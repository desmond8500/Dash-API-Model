<?php

namespace App\Repositories;

use App\Models\ReportPeople;
use App\Repositories\BaseRepository;

/**
 * Class ReportPeopleRepository
 * @package App\Repositories
 * @version October 19, 2022, 11:19 pm UTC
*/

class ReportPeopleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'report_id',
        'firstname',
        'lastname',
        'company',
        'job'
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
        return ReportPeople::class;
    }
}
