<?php
namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends BaseCrudController
{
    public function __construct()
    {
        parent::__construct(new Room());
    }
}
