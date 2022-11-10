<?php

namespace App\Repositories;

use App\Models\Catalogue;
use App\Repositories\BaseRepository;

/**
 * Class CatalogueRepository
 * @package App\Repositories
 * @version November 10, 2022, 12:37 am UTC
*/

class CatalogueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'brand_id',
        'name',
        'description',
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
        return Catalogue::class;
    }
}
