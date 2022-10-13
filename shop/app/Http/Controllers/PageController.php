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
        $items = Items::paginate(9)->withQueryString();
        $subCategories = SubCategory::all();
        $categories = Category::all();


        if($request->sort == 'price_asc'){
            $items= Items::orderBy('price', 'asc')->paginate(9)->withQueryString();
        }
        else if($request->sort == 'price_desc'){
            $items= Items::orderBy('price', 'desc')->paginate(9)->withQueryString();
        }



        
        return view('main.list', [
            'items' => $items,
            'subCategories' => $subCategories,
            'categories' => $categories,
            'sort' => $request->sort ?? '0',
            'sortSelect' => Items::SORT_SELECT,
        ]);
    }

    public function show(Items $items)
    {
        return view('main.show', ['items' => $items]);
    }

 




}
