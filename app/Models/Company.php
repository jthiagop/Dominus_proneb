<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'cnpj',
        'data_cnpj',
        'data_fundacao',
        'natureza',
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function subsidiary()
    {
        return $this->hasMany(Subsidiary::class);
    }
}
