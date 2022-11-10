<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Auth;


class PageController extends Controller
{
    public function index()
    {
        $items = Items::orderBy('created_at', 'asc')->paginate(6)->withQueryString();
        $rated = Items::orderBy('rating', 'desc')->paginate(8)->withQueryString();
        $subCategories = SubCategory::all();
        $categories = Category::all();
        return view('main.index', [
            'items' => $items,
            'subCategories' => $subCategories,
            'categories' => $categories,
            'rated' => $rated
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
            if ($request->sort == 'rate_asc') {
                $items = $items->orderBy('rating', 'asc');
            } else if ($request->sort == 'rate_desc') {
                $items = $items->orderBy('rating', 'desc');
            } else if ($request->sort == 'title_asc') {
                $items = $items->orderBy('title', 'asc');
            } else if ($request->sort == 'title_desc') {
                $items = $items->orderBy('title', 'desc');
            }
        }
        $perPage = match ($request->per_page) {
            '5' => 5,
            '11' => 11,
            '20' => 20,
            default => 11
        };

        if ($request->s) {
            $items = $items->where('title', 'like', '%' . $request->s . '%');
        }





        return view('main.list', [
            'items' => $items->orderBy('title', 'asc')->paginate($perPage)->withQueryString(),
            'subCategories' => SubCategory::orderBy('sub_category', 'asc')->get(),
            'categories' => Category::orderBy('category', 'asc')->get(),
            'cat' => $request->cat ?? '0',
            'subCat' => $request->subCat ?? '0',
            'sort' => $request->sort ?? '0',
            'sortSelect' => Items::SORT_SELECT,
            's' => $request->s ?? '',
            'perPage' => $request->per_page
        ]);
    }

    public function shipping()
    {
        return view('main.shipping');
    }

    public function policy()
    {
        return view('main.policy');
    }
    public function show(Items $items)
    {
        return view('main.show', ['items' => $items]);
    }

    public function rate(Request $request, Items $items)
    {
        $votes = json_decode($items->votes ?? json_encode([]));
        if (in_array(Auth::user()->id, $votes)) {
            return redirect()->back()->with('not', 'You already rated this item');
        }
        $votes[] = Auth::user()->id;
        $items->votes = json_encode($votes);
        $items->rating_sum = $items->rating_sum + $request->rate;
        $items->rating_count++;
        $items->rating = $items->rating_sum / $items->rating_count;
        $items->save();
        return redirect()->back()->with('ok', 'Thanks for rating this item');
    }
}
