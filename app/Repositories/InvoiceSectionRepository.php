<?php

namespace App\Repositories;

use App\Models\InvoiceSection;
use App\Repositories\BaseRepository;

/**
 * Class InvoiceSectionRepository
 * @package App\Repositories
 * @version October 7, 2022, 5:46 pm UTC
*/

class InvoiceSectionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'invoice_id',
        'name'
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
        return InvoiceSection::class;
    }
}
