<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Planning",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="batiment_id",
 *          description="batiment_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="system_id",
 *          description="system_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tache",
 *          description="tache",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="debut",
 *          description="debut",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="fin",
 *          description="fin",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
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
class Planning extends Model
{
    use SoftDeletes;

    public $table = 'plannings';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'projet_id',
        'batiment_id',
        'system_id',
        'tache',
        'debut',
        'fin',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'projet_id' => 'integer',
        'batiment_id' => 'integer',
        'system_id' => 'integer',
        'tache' => 'string',
        'debut' => 'date',
        'fin' => 'date',
        'status' => 'string'
    ];

    public static $rules = [

    ];

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class, 'batiment_id');
    }
    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class);
    }

    public function validate($date=null)
    {
        $carbon = Carbon::now()->settings([
            'locale' => 'fr_FR',
            'timezone' => 'Africa/Dakar',
        ]);

        $debut = date_format($this->debut, 'd');
        $fin = date_format($this->fin, 'd');

        $m = $carbon->startOfWeek()->day + $date;
        var_dump($date);

        if ($m >= $debut && $m <= $fin) {
            return true;
        }

        return false;
    }

}
