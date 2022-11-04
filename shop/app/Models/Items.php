<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    public function getCategory()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function getSubCategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id', 'id');
    }

    const SORT_SELECT = [
        ['title_asc', 'Titile A-Z'],
        ['title_desc', 'Titile Z-A'],
        ['rate_asc', 'Rating 1-9'],
        ['rate_desc', 'Rating 9-1'],
        ['price_asc', 'Price 1-9'],
        ['price_desc', 'Price 9-1'],
    ];

    

}
