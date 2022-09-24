<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Article",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="reference",
 *          description="reference",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          description="quantity",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="brand_id",
 *          description="brand_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="provider_id",
 *          description="provider_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="storage_id",
 *          description="storage_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="priority",
 *          description="priority",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="price",
 *          description="price",
 *          type="number",
 *          format="number"
 *      )
 * )
 */
class Article extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'articles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'reference',
        'description',
        'quantity',
        'brand_id',
        'provider_id',
        'storage_id',
        'priority',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'reference' => 'string',
        'description' => 'string',
        'quantity' => 'integer',
        'brand_id' => 'integer',
        'provider_id' => 'integer',
        'storage_id' => 'integer',
        'priority' => 'integer',
        'price' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
