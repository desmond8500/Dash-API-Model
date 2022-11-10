<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @SWG\Definition(
 *      definition="Projet",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="client_id",
 *          description="client_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="logo",
 *          description="logo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
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
class Projet extends Model
{
    use SoftDeletes;


    public $table = 'projets';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'client_id',
        'name',
        'logo',
        'description',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'name' => 'string',
        'logo' => 'string',
        'description' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * Get the client that owns the Projet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get all of the buildings for the Projet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buildings(): HasMany
    {
        return $this->hasMany(Building::class);
    }
    /**
     * Get all of the invoices for the Projet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Building::class);
    }
    /**
     * Get all of the reports for the Projet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reports(): HasMany
    {
        return $this->hasMany(Building::class);
    }


}
