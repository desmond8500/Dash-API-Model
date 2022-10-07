<?php

namespace App\Repositories;

use App\Models\RoomArticle;
use App\Repositories\BaseRepository;

/**
 * Class RoomArticleRepository
 * @package App\Repositories
 * @version October 7, 2022, 6:14 pm UTC
*/

class RoomArticleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_id',
        'article_id'
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
        return RoomArticle::class;
    }
}
