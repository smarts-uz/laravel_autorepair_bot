<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationFromForm extends Model
{
    use HasFactory;

    /**
     * Disable timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Fillable variables
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'message',
        'phone_number',
        'longitude',
        'latitude',
        'user_telegram_id',
        'type',
        'created_at',
        'updated_at'
    ];
}
