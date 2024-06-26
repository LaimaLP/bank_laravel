<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'accountNumber',
        'client_id',
        'balance',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
