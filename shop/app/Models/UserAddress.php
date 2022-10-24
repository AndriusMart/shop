<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'city', 'phone', 'postal_code'];
    public function getUsers()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
