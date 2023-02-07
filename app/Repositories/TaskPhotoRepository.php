<?php

namespace App\Repositories;

use App\Models\TaskPhoto;
use App\Repositories\BaseRepository;

/**
 * Class TaskPhotoRepository
 * @package App\Repositories
 * @version February 4, 2023, 8:02 pm UTC
*/

class TaskPhotoRepository extends BaseRepository
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
        return TaskPhoto::class;
    }
}
