<?php
namespace App\Http\Swagger;

/**
 * @OA\Info(
 *     version="1.0",
 *     title="Easy PlayStation API endpoints"
 * )
 * @OAS\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     in="header",
 *     name="Authorization"
 * )
 */



class InfoSwagger {}
