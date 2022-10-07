<?php

namespace App\Repositories;

use App\Models\ContactMail;
use App\Repositories\BaseRepository;

/**
 * Class ContactMailRepository
 * @package App\Repositories
 * @version October 7, 2022, 5:51 pm UTC
*/

class ContactMailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contact_id',
        'email'
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
        return ContactMail::class;
    }
}
