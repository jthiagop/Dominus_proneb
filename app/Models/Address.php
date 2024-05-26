<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'company_id',
        'subsidiary_id',
        'cep',
        'rua',
        'complemento',
        'cidade',
        'numero',
        'bairro',
        'uf',
    ];

    public function company()
    {
        return $this->hasOne( Company::class);
    }

    public function subsidiary()
    {
        return $this->hasOne( Subsidiary::class);
    }
}
