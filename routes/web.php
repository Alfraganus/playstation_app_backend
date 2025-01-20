<?php

use App\Events\BroadcastMessage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    event(new BroadcastMessage([
        [
            'room_id'=>1,
            'RoomName'=>'Barca is available 2',
            'roomStair'=>1,
            'isBusy'=>1,
        ],
        [
            'room_id' => 2,
            'RoomName' => 'Madrid is busy',
            'roomStair' => 2,
            'isBusy' => 0,
        ],
        [
            'room_id' => 3,
            'RoomName' => 'Sevilla',
            'roomStair' => 1,
            'isBusy' => 1,
        ],
        [
            'room_id' => 4,
            'RoomName' => 'Valencia',
            'roomStair' => 3,
            'isBusy' => 0,
        ],
        [
            'room_id' => 5,
            'RoomName' => 'Atletico',
            'roomStair' => 2,
            'isBusy' => 1,
        ],
        [
            'room_id' => 6,
            'RoomName' => 'Granada',
            'roomStair' => 1,
            'isBusy' => 0,
        ],
        [
            'room_id' => 7,
            'RoomName' => 'Bilbao',
            'roomStair' => 3,
            'isBusy' => 1,
        ],
    ]));
    return 111;
});
