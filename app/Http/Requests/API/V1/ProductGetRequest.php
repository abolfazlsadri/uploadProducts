<?php

namespace App\Http\Requests\API\V1;

use App\Category;
use Illuminate\Foundation\Http\FormRequest;

class ProductGetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'numeric',
            'page' => 'numeric',
            'per_page' => 'numeric'
        ];
    }
}
