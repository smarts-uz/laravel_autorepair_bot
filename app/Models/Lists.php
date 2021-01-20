<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Lists extends Model
{
    /**
     * Get category of the list
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoryId()
    {
        return $this->belongsTo(Category::class);
    }
}
