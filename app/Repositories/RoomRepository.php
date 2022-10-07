<?php

namespace App\Repositories;

use App\Models\Room;
use App\Repositories\BaseRepository;

/**
 * Class RoomRepository
 * @package App\Repositories
 * @version October 7, 2022, 6:13 pm UTC
*/

class RoomRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'stage_id',
        'name',
        'description'
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
        return Room::class;
    }
}
