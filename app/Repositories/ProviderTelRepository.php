<?php

namespace App\Repositories;

use App\Models\ProviderTel;
use App\Repositories\BaseRepository;

/**
 * Class ProviderTelRepository
 * @package App\Repositories
 * @version November 10, 2022, 12:28 am UTC
*/

class ProviderTelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'provider_id',
        'tel'
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
        return ProviderTel::class;
    }
}
