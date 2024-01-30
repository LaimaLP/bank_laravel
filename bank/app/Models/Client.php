<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'personalNumber',
    ];


    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')->orWhere('surname', 'like', '%' . request('search') . '%')->orWhere('personalNumber', 'like', '%' . request('search') . '%');
        }
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }


}
