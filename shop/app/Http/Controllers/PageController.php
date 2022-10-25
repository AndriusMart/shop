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

    public function list(Request $request)
    {
        $items = Items::where('id', '>', '0');
        if ($request->subCat || $request->cat || $request->sort) {
            if ($request->cat) {
                $items = $items->where('category_id', 'like', '%' . $request->cat  . '%');
            }
            if ($request->subCat) {
                
                $items = $items->where('sub_category_id', 'like', '%' . $request->subCat  . '%');
            }
            if ($request->sort == 'price_asc') {
                $items = $items->orderBy('price', 'asc');
            } else if ($request->sort == 'price_desc') {
                $items = $items->orderBy('price', 'desc');
            }
        }




        return view('main.list', [
            'items' => $items->paginate(12)->withQueryString(),
            'subCategories' => SubCategory::orderBy('sub_category', 'asc')->get(),
            'categories' => Category::orderBy('category', 'asc')->get(),
            'cat' => $request->cat ?? '0',
            'subCat' => $request->subCat ?? '0',
            'sort' => $request->sort ?? '0',
            'sortSelect' => Items::SORT_SELECT,
        ]);
    }

    public function show(Items $items)
    {
        return view('main.show', ['items' => $items]);
    }
}
