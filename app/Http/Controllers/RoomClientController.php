<?php
namespace App\Http\Controllers;

use App\Models\RoomClient;

class RoomClientController extends BaseCrudController
{
    public function __construct()
    {
        parent::__construct(new RoomClient());
    }
}
