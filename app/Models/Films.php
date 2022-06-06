<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Films
 * @package App\Models
 * @version June 1, 2022, 8:37 pm UTC
 *
 * @property string $name
 * @property string $description
 * @property string $release_date
 * @property integer $ticket_price
 * @property string $rating
 * @property string $country
 * @property string $genre
 * @property string $photo
 */
class Films extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'films';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'release_date',
        'ticket_price',
        'rating',
        'country',
        'genre',
        'photo',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'release_date' => 'date',
        'ticket_price' => 'integer',
        'rating' => 'string',
        'country' => 'string',
        'genre' => 'string',
        'photo' => 'string',
        'slug' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'release_date' => 'required',
        'ticket_price' => 'required',
        // 'rating' => 'requried',
        'country' => 'required',
        // 'genre' => 'required',
        // 'photo' => 'required'
    ];

    
}
