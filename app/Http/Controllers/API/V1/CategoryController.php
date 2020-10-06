<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\API\V1\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
    protected $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    /**
     * @OA\Schema(
     *     schema="categoryGet",
     * allOf={
     *    @OA\Schema(
     *       @OA\Property(property="result", type="array", @OA\Items(ref="#/components/schemas/Category")),
     *    )
     * }
     * )
     *
     * @OA\Get(
     * path="/api/v1/getCategory",
     * description="Get categories",
     * tags={"Category"},
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="data", type="object", ref="#/components/schemas/categoryGet")
     *        )
     *     )
     * )
     */
    public function index()
    {
        $result = $this->categoryInterface->gets();
        return response()->json($result, $result['status']);
    }
}
