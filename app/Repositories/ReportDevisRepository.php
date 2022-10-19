<?php

namespace App\Repositories;

use App\Models\ReportDevis;
use App\Repositories\BaseRepository;

/**
 * Class ReportDevisRepository
 * @package App\Repositories
 * @version October 19, 2022, 11:21 pm UTC
*/

class ReportDevisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'section_id',
        'devis_id'
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
        return ReportDevis::class;
    }
}
