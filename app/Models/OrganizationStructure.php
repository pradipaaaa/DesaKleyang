<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationStructure extends Model
{
    protected $fillable = ['title', 'image', 'description', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
