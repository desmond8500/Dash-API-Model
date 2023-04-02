<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="ContactTel",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="contact_id",
 *          description="contact_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tel",
 *          description="tel",
 *          type="string"
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
class ContactTel extends Model
{
    use SoftDeletes;

    public $table = 'contact_tels';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'contact_id',
        'tel'
    ];

    protected $casts = [
        'id' => 'integer',
        'contact_id' => 'integer',
        'tel' => 'string'
    ];

    public static $rules = [

    ];


}
