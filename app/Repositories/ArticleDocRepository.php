<?php

namespace App\Repositories;

use App\Models\ArticleDoc;
use App\Repositories\BaseRepository;

/**
 * Class ArticleDocRepository
 * @package App\Repositories
 * @version November 10, 2022, 12:57 am UTC
*/

class ArticleDocRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'article_id',
        'name',
        'folder',
        'doc_type'
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
        return ArticleDoc::class;
    }
}
