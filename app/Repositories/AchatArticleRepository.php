<?php

namespace App\Repositories;

use App\Models\AchatArticle;
use App\Repositories\BaseRepository;

/**
 * Class AchatArticleRepository
 * @package App\Repositories
 * @version November 10, 2022, 12:52 am UTC
*/

class AchatArticleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'achat_id',
        'article_id',
        'quantity',
        'date'
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
        return AchatArticle::class;
    }
}
