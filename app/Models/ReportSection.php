<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="ReportSection",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="report_id",
 *          description="report_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="order",
 *          description="order",
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
class ReportSection extends Model
{
    use SoftDeletes;

    public $table = 'report_sections';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'report_id',
        'title',
        'description',
        'order'
    ];

    protected $casts = [
        'id' => 'integer',
        'report_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'order' => 'integer'
    ];

    public static $rules = [

    ];

    public function modalites(): HasOne
    {
        return $this->hasOne(ReportModalite::class, 'section_id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(ReportFiles::class, 'report_id');
    }

}
