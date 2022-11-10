<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Repositories\BaseRepository;

/**
 * Class BrandRepository
 * @package App\Repositories
 * @version November 10, 2022, 12:30 am UTC
*/

class BrandRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'logo'
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
        return Brand::class;
    }
}
