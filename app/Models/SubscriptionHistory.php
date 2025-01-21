<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionHistory extends Model
{
    use HasFactory;

    protected $table = 'subscription_history';
    protected $fillable = [
        'admin_user_id',
        'starting_subscription',
        'ending_subscription',
        'tariff_id',
    ];

    public function adminUser()
    {
        return $this->belongsTo(User::class, 'admin_user_id');
    }

}
