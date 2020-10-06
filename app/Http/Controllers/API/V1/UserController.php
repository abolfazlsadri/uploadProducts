<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Services\API\V1\Interfaces\UserInterface;
use App\Http\Requests\API\V1\UserLoginRequest;
use App\Http\Requests\API\V1\UserRegisterRequest;
use App\Http\Requests\API\V1\UserCreateAdminRequest;

class UserController extends Controller
{
    protected $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * @OA\Post(
     * path="/api/v1/login",
     * summary="Sign in",
     * description="Login by email, password",
     * operationId="authLogin",
     * tags={"auth"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *        )
     *     )
     * )
     */
    public function login(UserLoginRequest $request)
    {
        $input = $request->all();
        $result = $this->userInterface->checkUser($input);
        return response()->json($result, $result['status']);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/register",
     *     tags={"user"},
     *     operationId="create user",
     *     description="",
     *     @OA\RequestBody(
     *         description="User object that needs to be added to the store",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/User")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Validate invalid",
     *     )
     * )
     *
     */
    public function register(UserRegisterRequest $request)
    {
        $input = $request->all();
        $result = $this->userInterface->createUser($input);
        return response()->json($result, $result['status']);
    }

    /**
   
     * @OA\Post(
     *     path="/api/v1/createAdmin",
     *     tags={"Admin"},
     *     operationId="create admin",
     *     description="",
     *     security={ {"Bearer": {} }},
     *     @OA\RequestBody(
     *         description="Admin object that needs to be added to the store",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/User")
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
    public function createAdmin(UserCreateAdminRequest $request)
    {
        $input = $request->all();
        $result = $this->userInterface->createAdmin($input);
        return response()->json($result, $result['status']);
    }
}
