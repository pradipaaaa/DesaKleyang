<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Potential extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'category', 'photo', 'description', 'benefit', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function categories(): array
    {
        return [
            'pertanian'  => 'Pertanian',
            'peternakan' => 'Peternakan',
            'wisata'     => 'Wisata',
            'kerajinan'  => 'Kerajinan',
            'perkebunan' => 'Perkebunan',
            'lainnya'    => 'Lainnya',
        ];
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::categories()[$this->category] ?? $this->category;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
