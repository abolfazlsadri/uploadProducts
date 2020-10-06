<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(required={"title", "description", "url"})
 */
class Category extends Model
{

    /**
     * @OA\Property(type="integer")
     */
    protected $id;

    /**
     * @OA\Property(type="string")
     */
    protected $url;

    /**
     * @OA\Property(type="string")
     */
    protected $title;

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

    protected $fillable = [
        'url',
        'title',
        'description',
    ];

    public function products()
    {
        return $this->hasMany('App/Product', 'category_id', 'id');
    }
}
