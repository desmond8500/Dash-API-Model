<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="ReportFiles",
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
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="folder",
 *          description="folder",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="extension",
 *          description="extension",
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
class ReportFiles extends Model
{
    use SoftDeletes;

    public $table = 'report_files';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'report_id',
        'name',
        'folder',
        'extension'
    ];

    protected $casts = [
        'id' => 'integer',
        'report_id' => 'integer',
        'name' => 'string',
        'folder' => 'string',
        'extension' => 'string'
    ];

    public static $rules = [

    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(ReportSection::class, 'section_id');
    }


}
