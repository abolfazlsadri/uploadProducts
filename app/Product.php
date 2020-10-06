<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * @OA\Schema(required={"name", "price", "category_id", "count"})
 */

class Product extends Model
{
    use Searchable;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'count'
    ];
    
    /**
     * @OA\Property(type="integer")
     */
    protected $count;

    /**
     * @OA\Property(type="string")
     */
    protected $name;

    /**
     * @OA\Property(type="integer")
     */
    protected $price;

    /**
     * @OA\Property(type="string")
     */
    protected $description;

    /**
     * @OA\Property(property="created_at", type="string", format="date-time", description="Initial creation timestamp", readOnly="true")
     */
    protected $created_at;

    /**
     * @OA\Property(property="updated_at", type="string", format="date-time", description="Last update timestamp", readOnly="true")   
     */
    protected $updated_at;

}
