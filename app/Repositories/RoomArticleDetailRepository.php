<?php

namespace App\Repositories;

use App\Models\RoomArticleDetail;
use App\Repositories\BaseRepository;

/**
 * Class RoomArticleDetailRepository
 * @package App\Repositories
 * @version October 7, 2022, 6:16 pm UTC
*/

class RoomArticleDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'room_article_id',
        'saignee',
        'fourreau',
        'enduit',
        'tirage',
        'pose',
        'connexion',
        'test',
        'service'
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
        return RoomArticleDetail::class;
    }
}
