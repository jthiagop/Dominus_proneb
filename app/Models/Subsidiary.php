<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'cnpj',
        'data_cnpj',
        'data_fundacao',
        'natureza',
        'status'
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function banks()
    {
        return $this->hasMany(Banco::class);
    }

    public function lancamento()
    {
        return $this->hasMany(caixa::class);
    }

    public function fileupdate()
    {
        return $this->hasMany(FileUpdate::class);
    }
}
