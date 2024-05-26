<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsidiary_user extends Model
{
    protected $table = 'subsidiary_user';


    use HasFactory;
    protected $fillable =
    [
        'user_id',
        'subsidiary_id'
    ];


    public function users() {
        return $this->belongsToMany(User::class);
    }
}
