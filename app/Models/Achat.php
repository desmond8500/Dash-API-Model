<?php

namespace App\Models;

use App\Http\Controllers\MainController;
use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Achat",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="date",
 *          description="date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
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
class Achat extends Model
{
    use SoftDeletes;

    public $table = 'achats';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'date',
        'description',
        'tva',
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'date' => 'date',
        'description' => 'string',
        'tva' => 'string',
    ];

    public static $rules = [

    ];

    public function articles(): HasMany
    {
        return $this->hasMany(AchatArticle::class);
    }

    public function total($id)
    {
        return MainController::total_Achat($id);
    }

}
