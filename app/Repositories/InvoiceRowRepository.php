<?php

namespace App\Repositories;

use App\Models\InvoiceRow;
use App\Repositories\BaseRepository;

/**
 * Class InvoiceRowRepository
 * @package App\Repositories
 * @version October 7, 2022, 5:46 pm UTC
*/

class InvoiceRowRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'invoice_id',
        'article_id',
        'reference',
        'quantity',
        'coef',
        'priority',
        'section_id',
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
        return InvoiceRow::class;
    }
}
