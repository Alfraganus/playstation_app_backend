<?php
namespace App\Http\Swagger;

/**
 * @OA\Post(
 *     path="/api/user/register",
 *     summary="Register a new admin user",
 *     description="Registers a new admin user and returns the created user data.",
 *     tags={"Auth"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "username", "password", "password_confirmation"},
 *             @OA\Property(property="name", type="string", example="John Doe"),
 *             @OA\Property(property="username", type="string", format="email", example="alfra"),
 *             @OA\Property(property="password", type="string", format="password", example="1234"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Admin user registered successfully.",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="message", type="string", example="Admin user registered successfully."),
 *             @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="name", type="string", example="John Doe"),
 *                 @OA\Property(property="email", type="string", example="john.doe@example.com"),
 *                 @OA\Property(property="role", type="string", example="admin")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error.",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="The given data was invalid."),
 *             @OA\Property(property="errors", type="object")
 *         )
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Failed to register admin user.",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=false),
 *             @OA\Property(property="message", type="string", example="Failed to register admin user."),
 *             @OA\Property(property="error", type="string", example="Server error message.")
 *         )
 *     )
 * )
 */


class RegisterSwagger {}
