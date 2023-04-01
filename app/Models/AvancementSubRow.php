<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="AvancementSubRow",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="avancement_row_id",
 *          description="avancement_row_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="start",
 *          description="start",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="end",
 *          description="end",
 *          type="string",
 *          format="date"
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
class AvancementSubRow extends Model
{
    use SoftDeletes;

    public $table = 'avancement_sub_rows';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'avancement_row_id',
        'name',
        'start',
        'end',
        'progress',
        'comment',
        'order',
    ];

    protected $casts = [
        'id' => 'integer',
        'avancement_row_id' => 'integer',
        'name' => 'string',
        'start' => 'date',
        'end' => 'date',
        'progress' => 'string',
        'comment' => 'string',
        'order' => 'string',
    ];

    public static $rules = [

    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(AvancementRow::class);
    }

    public function duration()
    {
        $carbon = new Carbon();
        return $carbon->parse($this->end)->diffInDays($this->start)+1;
    }
}
