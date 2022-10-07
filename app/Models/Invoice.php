<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Invoice",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="projet_id",
 *          description="projet_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="reference",
 *          description="reference",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="client_name",
 *          description="client_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="client_tel",
 *          description="client_tel",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="client_address",
 *          description="client_address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="discount",
 *          description="discount",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="tva",
 *          description="tva",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="brs",
 *          description="brs",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Invoice extends Model
{
    use SoftDeletes;


    public $table = 'invoices';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'projet_id',
        'reference',
        'status',
        'description',
        'client_name',
        'client_tel',
        'client_address',
        'discount',
        'tva',
        'brs'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'projet_id' => 'integer',
        'reference' => 'string',
        'status' => 'string',
        'description' => 'string',
        'client_name' => 'string',
        'client_tel' => 'string',
        'client_address' => 'string',
        'discount' => 'decimal:2',
        'tva' => 'decimal:2',
        'brs' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
