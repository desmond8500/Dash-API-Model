<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="AchatArticle",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="achat_id",
 *          description="achat_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="article_id",
 *          description="article_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          description="quantity",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="date",
 *          description="date",
 *          type="string",
 *          format="date"
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
class AchatArticle extends Model
{
    use SoftDeletes;

    public $table = 'achat_articles';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'achat_id',
        'article_id',
        'quantity',
        'date',
        'provider_id',
        'designation',
        'reference',
        'facture',
        'price',
        'description',
    ];

    protected $casts = [
        'id' => 'integer',
        'achat_id' => 'integer',
        'article_id' => 'integer',
        'quantity' => 'integer',
        'date' => 'date',
        'provider_id' => 'integer',
        'designation' => 'string',
        'reference' => 'string',
        'facture' => 'string',
        'price' => 'string',
        'description' => 'string',
    ];

    public static $rules = [

    ];

    public function article(): HasOne
    {
        return $this->hasOne(Article::class, 'id','article_id');
    }

}
