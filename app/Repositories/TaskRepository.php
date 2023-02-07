<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\BaseRepository;

/**
 * Class TaskRepository
 * @package App\Repositories
 * @version February 4, 2023, 8:01 pm UTC
*/

class TaskRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'devis_id',
        'objet',
        'description',
        'status_id',
        'priority_id'
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
        return Task::class;
    }
}
