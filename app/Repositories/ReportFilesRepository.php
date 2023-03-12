<?php

namespace App\Repositories;

use App\Models\ReportFiles;
use App\Repositories\BaseRepository;

/**
 * Class ReportFilesRepository
 * @package App\Repositories
 * @version March 2, 2023, 3:12 am UTC
*/

class ReportFilesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'report_id',
        'name',
        'folder',
        'extension'
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
        return ReportFiles::class;
    }
}
