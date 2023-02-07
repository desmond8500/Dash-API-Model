<?php

namespace App\Repositories;

use App\Models\TaskDocument;
use App\Repositories\BaseRepository;

/**
 * Class TaskDocumentRepository
 * @package App\Repositories
 * @version February 4, 2023, 8:03 pm UTC
*/

class TaskDocumentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'task_id',
        'name',
        'folder'
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
        return TaskDocument::class;
    }
}
