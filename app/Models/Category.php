<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Get category parent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentId()
    {
        return $this->belongsTo(self::class);
    }

    /**
     * Get icon url
     *
     * @return string
     */
    public function getIconUrl()
    {
        return '/storage/' . $this->icon;
    }

    /**
     * Get all category lists
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lists()
    {
        return $this->hasMany(Lists::class, 'category_id', 'id');
    }

    /**
     * Get all category services
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany(Service::class, 'category_id', 'id');
    }

    /**
     * Get all category works
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function our_works()
    {
        return $this->hasMany(OurWork::class, 'category_id', 'id');
    }
}
