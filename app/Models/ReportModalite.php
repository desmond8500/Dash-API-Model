<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="ReportModalite",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="section_id",
 *          description="section_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="duree",
 *          description="duree",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="technicien",
 *          description="technicien",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ouvrier",
 *          description="ouvrier",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="complexite",
 *          description="complexite",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="risque",
 *          description="risque",
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
class ReportModalite extends Model
{
    use SoftDeletes;

    public $table = 'report_modalites';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'section_id',
        'duree',
        'technicien',
        'ouvrier',
        'complexite',
        'risque'
    ];

    protected $casts = [
        'id' => 'integer',
        'section_id' => 'integer',
        'duree' => 'string',
        'technicien' => 'string',
        'ouvrier' => 'string',
        'complexite' => 'string',
        'risque' => 'string'
    ];

    public static $rules = [

    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(ReportSection::class, 'section_id');
    }

    public function complexite()
    {
        if ($this->complexite == 0) {
            return 'Faible';
        } else if ($this->complexite == 1) {
            return 'Moyenne';
        } else {
            return 'Haute';
        }
    }
    public function risque()
    {
        if ($this->complexite == 0) {
            return 'Faible';
        } else if ($this->complexite == 1) {
            return 'Moyen';
        } else {
            return 'Elevé';
        }
    }
}
