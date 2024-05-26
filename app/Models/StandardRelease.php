<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardRelease extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'tipo',
        'descricao',
        'user_id',
    ];
}
