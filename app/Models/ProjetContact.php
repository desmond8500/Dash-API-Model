<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="ProjetContact",
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
 *          property="contact_id",
 *          description="contact_id",
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
class ProjetContact extends Model
{
    use SoftDeletes;

    public $table = 'projet_contacts';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'projet_id',
        'contact_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'projet_id' => 'integer',
        'contact_id' => 'integer'
    ];

    public static $rules = [

    ];

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class, 'contact_id');
    }

    // public function contact2(): BelongsTo
    // {
    //     return $this->belongsTo(Contact::class);
    // }
}
