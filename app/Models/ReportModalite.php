<?php

namespace App\Models;

use Eloquent as Model;
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

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'section_id' => 'integer',
        'duree' => 'string',
        'technicien' => 'string',
        'ouvrier' => 'string',
        'complexite' => 'string',
        'risque' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
