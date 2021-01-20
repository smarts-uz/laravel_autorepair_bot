<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramUsersData extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone_number', 'longitude', 'latitude', 'user_telegram_id'
    ];
}
