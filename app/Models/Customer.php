<?php

namespace App\Models;

use App\Enums\CustomerSource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $casts = [
        'source' => CustomerSource::class
    ];
}
