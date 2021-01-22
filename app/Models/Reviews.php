<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    /**
     * Fillable properties
     *
     * @var string[]
     */
    public $fillable = [
        'name', 'phone_number', 'message'
    ];
}
