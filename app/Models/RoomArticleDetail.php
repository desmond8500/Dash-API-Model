<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="RoomArticleDetail",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="room_article_id",
 *          description="room_article_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="saignee",
 *          description="saignee",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="fourreau",
 *          description="fourreau",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="enduit",
 *          description="enduit",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tirage",
 *          description="tirage",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pose",
 *          description="pose",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="connexion",
 *          description="connexion",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="test",
 *          description="test",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="service",
 *          description="service",
 *          type="integer",
 *          format="int32"
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
class RoomArticleDetail extends Model
{
    use SoftDeletes;


    public $table = 'room_article_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'room_article_id',
        'saignee',
        'fourreau',
        'enduit',
        'tirage',
        'pose',
        'connexion',
        'test',
        'service'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'room_article_id' => 'integer',
        'saignee' => 'integer',
        'fourreau' => 'integer',
        'enduit' => 'integer',
        'tirage' => 'integer',
        'pose' => 'integer',
        'connexion' => 'integer',
        'test' => 'integer',
        'service' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
