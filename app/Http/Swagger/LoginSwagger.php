<?php
namespace App\Http\Swagger;

/**
 * @OA\Info(
 *     version="1.0",
 *     title="Easy playstation API endpoints"
 * )
 * @OA\Post(
 *     path="/api/user/login",
 *     summary="User login",
 *     description="Authenticate a user with their username and password",
 *     operationId="signIn",
 *     tags={"Auth"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"username", "password"},
 *             @OA\Property(property="username", type="string", example="johndoe"),
 *             @OA\Property(property="password", type="string", example="password123")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful login",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Successfully signed in"),
 *             @OA\Property(property="user", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="username", type="string", example="johndoe"),
 *                 @OA\Property(property="email", type="string", example="johndoe@example.com")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Invalid credentials",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Invalid credentials")
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="The username field is required."),
 *             @OA\Property(property="errors", type="object",
 *                 @OA\Property(property="username", type="array",
 *                     @OA\Items(type="string", example="The username field is required.")
 *                 ),
 *                 @OA\Property(property="password", type="array",
 *                     @OA\Items(type="string", example="The password field is required.")
 *                 )
 *             )
 *         )
 *     )
 * )
 */


class LoginSwagger {}
