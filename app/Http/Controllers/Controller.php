<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Challenge SpaceNews 🏅",
 *      description="Just a simple challenge",
 *      @OA\Contact(
 *          email="paulosanda@gmail.com",
 *      )
 * )
 * @OA\Get(
 *      path="/",
 *      @OA\Response(response="200", 
 *      description="Display"
 *      )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
