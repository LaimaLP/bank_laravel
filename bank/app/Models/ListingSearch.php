<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingSearch extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('search', 'like', '%' . request('search') . '%')->orWhere('name', 'like', '%' . request('search') . '%');
        }
    }
}
