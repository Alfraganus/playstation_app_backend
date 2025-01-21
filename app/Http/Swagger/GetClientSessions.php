<?php
namespace App\Http\Swagger;

/**
 * @OA\Get(
 *     path="/api/roomClient",
 *     summary="Get all rooms",
 *     tags={"Rooms"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="A list of rooms",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 type="object",
 *                 @OA\Property(
 *                     property="id",
 *                     type="integer",
 *                     description="ID of the room",
 *                     example=1
 *                 ),
 *                 @OA\Property(
 *                     property="admin_user_id",
 *                     type="integer",
 *                     description="ID of the admin user who owns the room",
 *                     example=1
 *                 ),
 *                 @OA\Property(
 *                     property="room_name",
 *                     type="string",
 *                     description="Name of the room",
 *                     example="Conference Room A"
 *                 ),
 *                 @OA\Property(
 *                     property="is_active",
 *                     type="boolean",
 *                     description="Room status",
 *                     example=true
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="No rooms found"
 *     )
 * )
 */
class GetClientSessions {}
