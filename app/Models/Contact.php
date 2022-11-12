<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Contact",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="firstname",
 *          description="firstname",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="lastname",
 *          description="lastname",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="avatar",
 *          description="avatar",
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
class Contact extends Model
{
    use SoftDeletes;


    public $table = 'contacts';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'firstname',
        'lastname',
        'description',
        'avatar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'firstname' => 'string',
        'lastname' => 'string',
        'description' => 'string',
        'avatar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * Get all of the tels for the Contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tels(): HasMany
    {
        return $this->hasMany(ContactTel::class);
    }
    /**
     * Get all of the emails for the Contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emails(): HasMany
    {
        return $this->hasMany(ContactMail::class);
    }
}
