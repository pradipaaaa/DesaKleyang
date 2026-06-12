<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VillageOfficial extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'position', 'photo', 'description', 'phone', 'email', 'order', 'is_head', 'is_active',
    ];

    protected $casts = [
        'is_head'   => 'boolean',
        'is_active' => 'boolean',
        'order'     => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('name');
    }
}
