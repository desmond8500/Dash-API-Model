<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="AvancementRow",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="int avancement_id",
 *          description="int avancement_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="progress",
 *          description="progress",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="comment",
 *          description="comment",
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
class AvancementRow extends Model
{
    use SoftDeletes;

    public $table = 'avancement_rows';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'avancement_id',
        'name',
        'comment'
    ];

    protected $casts = [
        'id' => 'integer',
        'avancement_id' => 'integer',
        'name' => 'string',
        'comment' => 'string'
    ];

    public static $rules = [

    ];

    public function rows(): HasMany
    {
        return $this->hasMany(AvancementSubRow::class);
    }

}
