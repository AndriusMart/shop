<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    const STATUS = [
        1 => 'Created',
        2 => 'Payed',
        3 => 'In progress',
        4 => 'Shipped',
        5 => 'Recived',

    ];
    // protected $casts = [
    //     'item_id' => 'array',
    // ];

    protected $fillable = ['item_id', 'user_id', 'status', 'total'];

    public function getItems()
    {
        return $this->belongsTo(Items::class,'item_id', 'id');
    }

    public function getUsers()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
