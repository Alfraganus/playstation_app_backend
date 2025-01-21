<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomClient extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'room_clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_user_id',
        'room_id',
        'started_at',
        'finished_at',
        'worker_id',
    ];

    /**
     * Get the admin user that owns the room client.
     */
    public function adminUser()
    {
        return $this->belongsTo(User::class, 'admin_user_id');
    }

    /**
     * Get the room that is associated with the room client.
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Get the worker associated with the room client.
     */
    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id');
    }
}
