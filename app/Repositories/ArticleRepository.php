<?php

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\BaseRepository;

/**
 * Class ArticleRepository
 * @package App\Repositories
 * @version November 10, 2022, 12:26 am UTC
*/

class ArticleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'brand_id',
        'provider_id',
        'designation',
        'reference',
        'description',
        'quantity',
        'priority',
        'price',
        'image'
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
        return Article::class;
    }
}
