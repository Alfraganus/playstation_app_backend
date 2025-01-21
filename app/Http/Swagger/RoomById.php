<?php
namespace App\Http\Swagger;

/**
 * @OA\Get(
 *     path="/api/rooms/{id}",
 *     summary="Get a room by ID",
 *     tags={"Rooms"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the room",
 *         @OA\Schema(
 *             type="integer",
 *             example=1
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Details of the room",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="id",
 *                 type="integer",
 *                 description="ID of the room",
 *                 example=1
 *             ),
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
 *         response=404,
 *         description="Room not found"
 *     )
 * )
 */
class RoomById {}
