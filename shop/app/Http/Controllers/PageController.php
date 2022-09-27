<?php

namespace App\Http\Controllers;
use App\Models\Items;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $items = Items::orderBy('created_at', 'asc')->paginate(8)->withQueryString();
        $subCategories = SubCategory::all();
        $categories = Category::all();
        return view('main.index', [
            'items' => $items,
            'subCategories' => $subCategories,
            'categories' => $categories,
        ]);
    }

    public function list()
    {
        $items = Items::paginate(9)->withQueryString();

        $categories = Category::all();
        return view('main.list', [
            'items' => $items,

            'categories' => $categories,
        ]);
    }
}
