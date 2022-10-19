<?php

namespace App\Repositories;

use App\Models\ReportModalite;
use App\Repositories\BaseRepository;

/**
 * Class ReportModaliteRepository
 * @package App\Repositories
 * @version October 19, 2022, 11:23 pm UTC
*/

class ReportModaliteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'section_id',
        'duree',
        'technicien',
        'ouvrier',
        'complexite',
        'risque'
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
        return ReportModalite::class;
    }
}
