<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\API\V1\Interfaces\ProductInterface;
use App\Http\Requests\API\V1\ProductCreateRequest;
use App\Http\Requests\API\V1\ProductUpdateRequest;
use App\Http\Requests\API\V1\ProductGetRequest;

class ProductController extends Controller
{
    protected $prodactInterface;

    public function __construct(ProductInterface $prodactInterface)
    {
        $this->prodactInterface = $prodactInterface;
    }

    /**
     * @OA\Schema(
     *     schema="productGet",
     * allOf={
     *    @OA\Schema(
     *       @OA\Property(property="result", type="array", @OA\Items(ref="#/components/schemas/Product")),
     *    )
     * }
     * )
     *
     * @OA\Get(
     * path="/api/v1/products",
     * description="Get product",
     * tags={"Product"},
     * @OA\Parameter(
     *    description="number of page",
     *    in="query",
     *    name="page",
     *    required=false,
     *    example="1",
     *    @OA\Schema(
     *       type="integer",
     *       format="int64"
     *    )
     * ),
     *  @OA\Parameter(
     *    description="category id",
     *    name="category_id",
     *    required=false,
     *    in="query",     
     *    @OA\Schema( 
     *         type="integer", 
     *         format="int64"
     *    ),
     * ),
     *   @OA\Parameter(
     *    description="per page",
     *    in="query",
     *    name="per_page",
     *    required=false,
     *    example="10",
     *    @OA\Schema(
     *       type="integer",
     *       format="int64"
     *    )
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Success",
     *    @OA\JsonContent(
     *       @OA\Property(property="data", type="object", ref="#/components/schemas/productGet")
     *        )
     *     )
     * )
     */
    public function index(ProductGetRequest $request)
    {
        $input = $request->all();
        $result = $this->prodactInterface->gets($input);
        return response()->json($result, $result['status']);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/product/upload",
     *     tags={"Product"},
     *     operationId="create product",
     *     description="",
     *     security={ {"Bearer": {} }},
     *     @OA\RequestBody(
     *         description="Product object that needs to be added to the store",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 allOf={
     *                     @OA\Schema(
     *                         @OA\Property(
     *                             description="Item products",
     *                             property="products",
     *                             type="string", format="binary"
     *                         )
     *                     )
     *                 }
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *     ),
     *     @OA\Response(
     *        response=401,
     *        description="Returns when user is not authenticated",
     *        @OA\JsonContent(
     *           @OA\Property(property="message", type="string", example="Not authorized"),
     *        )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Validate invalid",
     *     )
     * )
     *
     */
    public function store(ProductCreateRequest $request)
    {
        $input = $request->all();
        $result = $this->prodactInterface->create($input);
        return response()->json($result, $result['status']);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/updateProduct/{id}",
     *     tags={"Product"},
     *     operationId="",
     *     summary="",
     *     description="",
     *     security={ {"Bearer": {} }},
     *     @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="",
     *     required=true,
     *     @OA\Schema(type="integer")
     *   ),
     *     @OA\RequestBody(
     *         description="",
     *         required=false,
     *         @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/Product")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Validate invalid",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="server error"
     *     )
     * )
     *
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $input = $request->all();
        $result = $this->prodactInterface->update($input, $id);
        return response()->json($result, $result['status']);
    }

    /**
     *
     * @OA\Delete(
     *     path="/api/v1/deleteProduct/{id}",
     *     tags={"Product"},
     *     security={ {"Bearer": {} }},
     *     @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="",
     *     required=true,
     *     @OA\Schema(type="integer")
     *   ),
     *     @OA\Response(response="200", description="success"),
     *     @OA\Response(response="404", description="Not found")
     * )
     *
     */
    public function destroy($id)
    {
        $result = $this->prodactInterface->delete($id);
        return response()->json($result, $result['status']);
    }
}
