<?php
namespace App\Http\Swagger;

/**
 * @OA\Post(
 *     path="/api/rooms",
 *     summary="Create a new room",
 *     tags={"Rooms"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"admin_user_id", "room_name", "is_active"},
 *             @OA\Property(
 *                 property="admin_user_id",
 *                 type="integer",
 *                 description="ID of the admin user who owns the room",
 *                 example=1
 *             ),
 *             @OA\Property(
 *                 property="room_name",
 *                 type="string",
 *                 description="Name of the room",
 *                 example="Conference Room A"
 *             ),
 *             @OA\Property(
 *                 property="is_active",
 *                 type="boolean",
 *                 description="Room status",
 *                 example=true
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Room created successfully",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 description="ID of the created room",
 *                 example=1
 *             ),
 *             @OA\Property(
 *                 property="admin_user_id",
 *                 type="integer",
 *                 description="Admin user ID",
 *                 example=1
 *             ),
 *             @OA\Property(
 *                 property="room_name",
 *                 type="string",
 *                 description="Room name",
 *                 example="Conference Room A"
 *             ),
 *             @OA\Property(
 *                 property="is_active",
 *                 type="boolean",
 *                 description="Room status",
 *                 example=true
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input data"
 *     )
 * )
 */
class CreateRoom {}
