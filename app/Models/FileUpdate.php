<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpdate extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'subsidiary_id',
        'caixa_id',
        'name',
        'path',
        'userName',
    ];


    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }

}
